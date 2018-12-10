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
use AppBundle\Form\ForgotPasswordType;
use AppBundle\Repository\Interfaces\UserRepositoryInterface;
use AppBundle\Service\Interfaces\MailerInterface;
use AppBundle\Service\Interfaces\TokenGeneratorInterface;
use Symfony\Component\Form\FormFactoryInterface;

/**
 * Class ForgotPasswordTypeHandler.
 */
final class ForgotPasswordTypeHandler extends FormTypeHandler
{
    /**
     * @var UserRepositoryInterface
     */
    private $repository;

    /**
     * @var MailerInterface
     */
    private $mailer;

    /**
     * @var TokenGeneratorInterface
     */
    private $token;

    /**
     * {@inheritdoc}
     */
    public function __construct(
        UserRepositoryInterface $repository,
        FormFactoryInterface $formFactory,
        MailerInterface $mailer,
        TokenGeneratorInterface $token
    ) {
        $this->repository   = $repository;
        $this->mailer       = $mailer;
        $this->token        = $token;
    }

    /**
     * @param UserInterface $user
     */
    public function onSuccess($user): void
    {
        if(!\is_null($user))
        {
            $user->setToken($this->token->generateToken($user));

            $this->repository->save($user);

            $this->mailer->sendMail($user, 'Mot de passe oublié', 'forgot_password');
        }
    }

    /**
     * {@inheritdoc}
     */
    public function getFormType(): String
    {
        return ForgotPasswordType::class;
    }
}
