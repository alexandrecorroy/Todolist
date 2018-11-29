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
use AppBundle\Form\Handler\Interfaces\UserRegistrationTypeHandlerInterface;
use AppBundle\Form\UserRegistrationType;
use AppBundle\Repository\Interfaces\UserRepositoryInterface;
use AppBundle\Service\Interfaces\MailerInterface;
use AppBundle\Service\Interfaces\PasswordGeneratorInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface;

/**
 * Class UserRegistrationTypeHandler.
 */
final class UserRegistrationTypeHandler implements UserRegistrationTypeHandlerInterface
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
     * @var FormFactoryInterface
     */
    private $formFactory;

    /**
     * {@inheritdoc}
     */
    public function __construct(
        EncoderFactoryInterface $encoder,
        UserRepositoryInterface $repository,
        PasswordGeneratorInterface $passwordGenerator,
        MailerInterface $mailer,
        FormFactoryInterface $formFactory
    ) {
        $this->encoder           = $encoder;
        $this->repository        = $repository;
        $this->passwordGenerator = $passwordGenerator;
        $this->mailer            = $mailer;
        $this->formFactory       = $formFactory;
    }

    /**
     * {@inheritdoc}
     */
    public function handle(
        FormInterface $form,
        UserInterface $user
    ): bool {
        if($form->isSubmitted() && $form->isValid())
        {
            $user->setPassword($this->passwordGenerator->generate());

            $this->mailer->sendMail($user, 'Vos identifiants de connexion', 'registration');

            $encoder = $this->encoder->getEncoder(User::class);

            $password = $encoder->encodePassword($user->getPassword(), null);

            $user->setPassword($password);

            $this->repository->save($user);

            return true;
        }

        return false;
    }

    /**
     * {@inheritdoc}
     */
    public function createForm(
        Request $request,
        UserInterface $user
    ): FormInterface {
        $form = $this->formFactory->create(UserRegistrationType::class, $user);

        return $form->handleRequest($request);
    }
}
