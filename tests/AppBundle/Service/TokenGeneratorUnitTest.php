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

use AppBundle\Entity\Interfaces\UserInterface;
use AppBundle\Service\Interfaces\TokenGeneratorInterface;
use AppBundle\Service\TokenGenerator;
use PHPUnit\Framework\TestCase;

/**
 * Class TokenGeneratorUnitTest.
 */
final class TokenGeneratorUnitTest extends TestCase
{
    /**
     * @var UserInterface|null
     */
    private $user = null;

    /**
     * {@inheritdoc}
     */
    public function setUp()
    {
        $this->user = $this->createMock(UserInterface::class);
    }

    /**
     * test implement interface
     */
    public function testImplementInterface()
    {
        $class = new TokenGenerator();

        static::assertInstanceOf(TokenGeneratorInterface::class, $class);
    }

    /**
     * test token is correctly returned
     */
    public function testTokenIsReturned()
    {
        $class = new TokenGenerator();

        static::assertNotEmpty($class->generateToken($this->user));
    }
}
