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

namespace Tests\AppBundle\Service;

use AppBundle\Service\Interfaces\PasswordGeneratorInterface;
use AppBundle\Service\PasswordGenerator;
use PHPUnit\Framework\TestCase;

/**
 * Class PasswordGeneratorUnitTest.
 */
final class PasswordGeneratorUnitTest extends TestCase
{
    /**
     * test implement interface
     */
    public function testImplementInterface()
    {
        $class = new PasswordGenerator();

        static::assertInstanceOf(PasswordGeneratorInterface::class, $class);
    }

    /**
     * test Password is returned
     */
    public function testPasswordIsReturned()
    {
        $class = new PasswordGenerator();

        static::assertEquals(PasswordGenerator::LENGTH_PASSWORD, strlen($class->generate()));
    }

}
