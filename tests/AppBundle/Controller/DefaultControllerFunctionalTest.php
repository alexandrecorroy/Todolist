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

use Symfony\Component\HttpFoundation\Response;
use Tests\AppBundle\DataFixtures\DataFixturesTestCase;

/**
 * Class DefaultControllerFunctionalTest.
 */
final class DefaultControllerFunctionalTest extends DataFixturesTestCase
{
    /**
     * test home page redirection if user not connected
     */
    public function testHomePageRedirectionIfNotConnected()
    {
        $this->client->request('GET', '/', array(), array(), array(), null);

        static::assertEquals(Response::HTTP_FOUND, $this->client->getResponse()->getStatusCode());
        static::assertTrue($this->client->getResponse()->headers->contains('content-type', 'text/html; charset=UTF-8'));
    }
}
