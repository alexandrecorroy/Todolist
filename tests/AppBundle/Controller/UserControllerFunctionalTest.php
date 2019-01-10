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
 * Class UserControllerFunctionalTest.
 */
final class UserControllerFunctionalTest extends DataFixturesTestCase
{
    /**
     * test list users
     */
    public function testListUser()
    {
        $this::createAuthenticatedRoleAdmin();

        $crawler = $this->client->request('GET', '/users');

        static::assertEquals(Response::HTTP_OK, $this->client->getResponse()->getStatusCode());
        static::assertTrue($this->client->getResponse()->headers->contains('content-type', 'text/html; charset=UTF-8'));
        static::assertGreaterThan(count($this->entityManager->getRepository(User::class)->listUsers()), $crawler->filter('tr')->count());
    }

    /**
     * test add user
     */
    public function testAddUser()
    {
        $this::createAuthenticatedRoleAdmin();

        $countTasksBeforeAdd = count($this->entityManager->getRepository(User::class)->listUsers());

        $crawler = $this->client->request('GET', '/users/create');

        static::assertEquals(Response::HTTP_OK, $this->client->getResponse()->getStatusCode());

        $buttonCrawlerNode = $crawler->selectButton('Ajouter');

        $form = $buttonCrawlerNode->form(array(
            'user_registration[username]'    => 'test',
            'user_registration[email]' => 'test@test.fr',
        ), 'POST');

        $this->client->submit($form);

        $this->client->followRedirect();

        static::assertEquals(Response::HTTP_OK, $this->client->getResponse()->getStatusCode());
        static::assertEquals($countTasksBeforeAdd+1, count($this->entityManager->getRepository(User::class)->listUsers()));

    }

}
