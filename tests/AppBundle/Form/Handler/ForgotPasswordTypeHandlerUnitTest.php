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

use AppBundle\Form\Handler\ForgotPasswordTypeHandler;
use AppBundle\Form\Handler\Interfaces\ForgotPasswordTypeHandlerInterface;
use AppBundle\Repository\Interfaces\UserRepositoryInterface;
use AppBundle\Service\Interfaces\MailerInterface;
use AppBundle\Service\Interfaces\TokenGeneratorInterface;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Form\FormFactoryInterface;

/**
 * Class ForgotPasswordTypeHandlerUnitTest.
 */
final class ForgotPasswordTypeHandlerUnitTest extends TestCase
{
    /**
     * @var UserRepositoryInterface|null
     */
    private $repository = null;

    /**
     * @var FormFactoryInterface|null
     */
    private $formFactory = null;

    /**
     * @var MailerInterface|null
     */
    private $mailer = null;

    /**
     * @var TokenGeneratorInterface|null
     */
    private $token = null;

    /**
     * {@inheritdoc}
     */
    public function setUp()
    {
        $this->repository  = $this->createMock(UserRepositoryInterface::class);
        $this->formFactory = $this->createMock(FormFactoryInterface::class);
        $this->mailer      = $this->createMock(MailerInterface::class);
        $this->token       = $this->createMock(TokenGeneratorInterface::class);
    }

    /**
     * test implement interface
     */
    public function testImplementInterface()
    {
        $class = new ForgotPasswordTypeHandler(
            $this->repository,
            $this->formFactory,
            $this->mailer,
            $this->token
        );

        static::assertInstanceOf(ForgotPasswordTypeHandlerInterface::class, $class);
    }

}
