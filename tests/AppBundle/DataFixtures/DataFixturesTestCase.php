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

namespace Tests\AppBundle\DataFixtures;

use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Component\Console\Input\StringInput;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Bundle\FrameworkBundle\Client;

/**
 * Class DataFixturesTestCase.
 */
class DataFixturesTestCase extends WebTestCase
{

    /**
     * @var Client|null
     */
    protected $client = null;

    /**
     * @var Application|null
     */
    protected static $application = null;

    /** @var  ContainerInterface $container */
    protected static $container = null;

    /** @var  EntityManager $entityManager */
    protected $entityManager = null;

    protected function setUp()
    {
        self::runCommand('doctrine:database:create');
        self::runCommand('doctrine:schema:update --force');
        self::runCommand('doctrine:fixtures:load  --no-interaction');

        $this->client        = static::createClient();
        self::$container     = $this->client->getContainer();
        $this->entityManager = self::$container->get('doctrine')->getManager();

        $this->client = static::createClient();
        parent::setUp();
    }

    protected static function runCommand($command)
    {
        $command = sprintf('%s --quiet', $command);

        return self::getApplication()->run(new StringInput($command));
    }

    protected static function getApplication()
    {
        if (null === self::$application) {
            $client = static::createClient();

            self::$application = new Application($client->getKernel());
            self::$application->setAutoExit(false);
        }

        return self::$application;
    }

    /**
     * login with role admin
     */
    protected function createAuthenticatedRoleAdmin()
    {
        $crawler = $this->client->request('GET', '/login');
        $buttonCrawlerNode = $crawler->selectButton('Se connecter');
        $form = $buttonCrawlerNode->form();
        $data = array('_username' => 'admin','_password' => 'admin');
        $this->client->submit($form,$data);

        $this->client->followRedirect();
    }

    /**
     * login with role user
     */
    protected function createAuthenticatedRoleUser()
    {
        $crawler = $this->client->request('GET', '/login');
        $buttonCrawlerNode = $crawler->selectButton('Se connecter');
        $form = $buttonCrawlerNode->form();
        $data = array('_username' => 'user','_password' => 'user');
        $this->client->submit($form,$data);

        $this->client->followRedirect();
    }
}
