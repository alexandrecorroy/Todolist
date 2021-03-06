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

namespace AppBundle\Form\Handler;

use AppBundle\Entity\Interfaces\UserInterface;
use AppBundle\Entity\User;
use AppBundle\Form\UserRegistrationType;
use AppBundle\Repository\Interfaces\UserRepositoryInterface;
use AppBundle\Service\Interfaces\MailerInterface;
use AppBundle\Service\Interfaces\PasswordGeneratorInterface;
use Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface;

/**
 * Class UserRegistrationTypeHandler.
 */
final class UserRegistrationTypeHandler extends FormTypeHandler
{
    /**
     * @var EncoderFactoryInterface
     */
    private $encoder;

    /**
     * @var UserRepositoryInterface
     */
    private $repository;

    /**
     * @var PasswordGeneratorInterface
     */
    private $passwordGenerator;

    /**
     * @var MailerInterface
     */
    private $mailer;

    /**
     * UserRegistrationTypeHandler constructor.
     *
     * @param EncoderFactoryInterface $encoder
     * @param UserRepositoryInterface $repository
     * @param PasswordGeneratorInterface $passwordGenerator
     * @param MailerInterface $mailer
     */
    public function __construct(
        EncoderFactoryInterface $encoder,
        UserRepositoryInterface $repository,
        PasswordGeneratorInterface $passwordGenerator,
        MailerInterface $mailer
    ) {
        $this->encoder           = $encoder;
        $this->repository        = $repository;
        $this->passwordGenerator = $passwordGenerator;
        $this->mailer            = $mailer;
    }

    /**
     * @param UserInterface $user
     */
    public function onSuccess($user): void
    {
        $user->setPassword($this->passwordGenerator->generate());

        $this->mailer->sendMail($user, 'Vos identifiants de connexion', 'registration');

        $encoder = $this->encoder->getEncoder(User::class);

        $password = $encoder->encodePassword($user->getPassword(), null);

        $user->setPassword($password);

        $this->repository->save($user);
    }

    /**
     * {@inheritdoc}
     */
    public function getFormType(): String
    {
        return UserRegistrationType::class;
    }
}
