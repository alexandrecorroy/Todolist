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

namespace Tests\AppBundle\Form\Handler;

use AppBundle\Form\Handler\Interfaces\UserUpdateTypeHandlerInterface;
use AppBundle\Form\Handler\UserUpdateTypeHandler;
use AppBundle\Repository\Interfaces\UserRepositoryInterface;
use AppBundle\Service\Interfaces\MailerInterface;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Form\FormFactoryInterface;

final class UserUpdateTypeHandlerUnitTest extends TestCase
{
    /**
     * @var UserRepositoryInterface|null
     */
    private $repository = null;

    /**
     * @var MailerInterface|null
     */
    private $mailer = null;

    /**
     * @var FormFactoryInterface|null
     */
    private $formFactory = null;

    /**
     * {@inheritdoc}
     */
    public function setUp()
    {
        $this->repository  = $this->createMock(UserRepositoryInterface::class);
        $this->mailer      = $this->createMock(MailerInterface::class);
        $this->formFactory = $this->createMock(FormFactoryInterface::class);
    }

    /**
     * test implement interface
     */
    public function testImplementInterface()
    {
        $class = new UserUpdateTypeHandler(
            $this->repository,
            $this->mailer,
            $this->formFactory
        );

        static::assertInstanceOf(UserUpdateTypeHandlerInterface::class, $class);
    }
}
