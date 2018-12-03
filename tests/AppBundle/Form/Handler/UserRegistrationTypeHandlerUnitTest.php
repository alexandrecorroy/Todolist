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

use AppBundle\Form\Handler\Interfaces\UserRegistrationTypeHandlerInterface;
use AppBundle\Form\Handler\UserRegistrationTypeHandler;
use AppBundle\Repository\Interfaces\UserRepositoryInterface;
use AppBundle\Service\Interfaces\MailerInterface;
use AppBundle\Service\Interfaces\PasswordGeneratorInterface;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface;

/**
 * Class UserRegistrationTypeHandlerUnitTest.
 */
final class UserRegistrationTypeHandlerUnitTest extends TestCase
{
    /**
     * @var EncoderFactoryInterface|null
     */
    private $encoder = null;

    /**
     * @var UserRepositoryInterface|null
     */
    private $repository = null;

    /**
     * @var PasswordGeneratorInterface|null
     */
    private $password = null;

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
        $this->encoder     = $this->createMock(EncoderFactoryInterface::class);
        $this->repository  = $this->createMock(UserRepositoryInterface::class);
        $this->password    = $this->createMock(PasswordGeneratorInterface::class);
        $this->mailer      = $this->createMock(MailerInterface::class);
        $this->formFactory = $this->createMock(FormFactoryInterface::class);
    }

    /**
     * test implement interface
     */
    public function testImplementInterface()
    {
        $class = new UserRegistrationTypeHandler(
            $this->encoder,
            $this->repository,
            $this->password,
            $this->mailer,
            $this->formFactory
        );

        static::assertInstanceOf(UserRegistrationTypeHandlerInterface::class, $class);
    }
}
