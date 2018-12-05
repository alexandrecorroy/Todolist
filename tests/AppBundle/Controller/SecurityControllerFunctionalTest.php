<?php

declare(strict_types=1);

/**
 * TodoList Project
 *
 * (c) CORROY Alexandre <alexandre.corroy@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tests\AppBundle\Controller;

use AppBundle\Entity\User;
use Symfony\Component\HttpFoundation\Response;
use Tests\AppBundle\DataFixtures\DataFixturesTestCase;

/**
 * Class SecurityControllerFunctionalTest.
 */
final class SecurityControllerFunctionalTest extends DataFixturesTestCase
{
    /**
     * test login as admin
     */
    public function testLoginAsAdmin()
    {
        $this::createAuthenticatedRoleAdmin();

        $crawler = $this->client->request('GET', '/');

        static::assertEquals(Response::HTTP_OK, $this->client->getResponse()->getStatusCode());
        static::assertTrue($this->client->getResponse()->headers->contains('content-type', 'text/html; charset=UTF-8'));
        static::assertGreaterThan(0, $crawler->filter(".dropdown")->count());
    }

    /**
     * test login as user
     */
    public function testLoginAsUser()
    {
        $this::createAuthenticatedRoleUser();

        $crawler = $this->client->request('GET', '/');

        static::assertEquals(Response::HTTP_OK, $this->client->getResponse()->getStatusCode());
        static::assertTrue($this->client->getResponse()->headers->contains('content-type', 'text/html; charset=UTF-8'));
        static::assertEquals(0, $crawler->filter(".dropdown")->count());
    }

    /**
     * test access to forgot password page
     */
    public function testAccessToForgotPassword()
    {
        $this->client->request('GET', '/forgotPassword', array(), array(), array(), null);

        static::assertEquals(Response::HTTP_OK, $this->client->getResponse()->getStatusCode());
        static::assertTrue($this->client->getResponse()->headers->contains('content-type', 'text/html; charset=UTF-8'));
    }

    /**
     * test reset password
     */
    public function testResetPasswordAndLoginWithNewsCredentials()
    {
        $crawler = $this->client->request('GET', '/forgotPassword', array(), array(), array(), null);

        $buttonCrawlerNode = $crawler->selectButton('Générer un nouveau mot de passe');

        $form = $buttonCrawlerNode->form(array(
            'forgot_password[email]'    => 'admin@todolist.fr'
        ), 'POST');

        $this->client->submit($form);

        $this->client->followRedirect();

        $user = $this->entityManager->getRepository(User::class)->findOneBy(['email' => 'admin@todolist.fr']);

        $crawler = $this->client->request('GET', '/resetPassword/'.$user->getToken(), array(), array(), array(), null);

        $buttonCrawlerNode = $crawler->selectButton('Modifier le mot de passe');

        $form = $buttonCrawlerNode->form(array(
            'reset_password[password][first]'    => 'newpassword',
            'reset_password[password][second]'   => 'newpassword'
        ), 'POST');

        $this->client->submit($form);

        $this->client->followRedirect();

        $crawler = $this->client->request('GET', '/login');
        $buttonCrawlerNode = $crawler->selectButton('Se connecter');
        $form = $buttonCrawlerNode->form();
        $data = array('_username' => 'admin','_password' => 'newpassword');
        $this->client->submit($form,$data);

        $this->client->followRedirect();

        $crawler = $this->client->request('GET', '/');

        static::assertEquals(Response::HTTP_OK, $this->client->getResponse()->getStatusCode());
        static::assertTrue($this->client->getResponse()->headers->contains('content-type', 'text/html; charset=UTF-8'));
        static::assertGreaterThan(0, $crawler->filter(".dropdown")->count());
    }
}
