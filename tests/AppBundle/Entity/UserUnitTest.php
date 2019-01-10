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

namespace Tests\AppBundle\Entity;

use AppBundle\Entity\Interfaces\UserInterface;
use AppBundle\Entity\User;
use PHPUnit\Framework\TestCase;

/**
 * Class UserUnitTest.
 */
final class UserUnitTest extends TestCase
{

    /**
     * test add simple user
     */
    public function testAddUser()
    {
        $user = new User();
        $user->setUsername('user');
        $user->setEmail('user@test.fr');
        $user->setPassword('user_password');
        $user->setIsAdmin(false);

        static::assertInstanceOf(UserInterface::class, $user);
        static::assertEquals("user@test.fr", $user->getEmail());
        static::assertEquals("user_password", $user->getPassword());
        static::assertEquals("user", $user->getUsername());
        static::assertEquals(false, $user->getIsAdmin());
    }

    /**
     * test add an admin
     */
    public function testAddAdmin()
    {
        $user = new User();
        $user->setUsername('admin');
        $user->setEmail('admin@test.fr');
        $user->setPassword('admin_password');
        $user->setIsAdmin(true);

        static::assertInstanceOf(UserInterface::class, $user);
        static::assertEquals("admin@test.fr", $user->getEmail());
        static::assertEquals("admin_password", $user->getPassword());
        static::assertEquals("admin", $user->getUsername());
        static::assertEquals(true, $user->getIsAdmin());
    }

}
