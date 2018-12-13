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
use AppBundle\Form\ResetPasswordType;
use AppBundle\Repository\Interfaces\UserRepositoryInterface;
use AppBundle\Service\Interfaces\MailerInterface;
use AppBundle\Service\Interfaces\TokenGeneratorInterface;
use Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface;

/**
 * Class ResetPasswordTypeHandler.
 */
final class ResetPasswordTypeHandler extends FormTypeHandler
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
     * @var EncoderFactoryInterface
     */
    private $encoder;

    /**
     * ResetPasswordTypeHandler constructor.
     *
     * @param UserRepositoryInterface $repository
     * @param MailerInterface $mailer
     * @param TokenGeneratorInterface $token
     * @param EncoderFactoryInterface $encoder
     */
    public function __construct(
        UserRepositoryInterface $repository,
        MailerInterface $mailer,
        TokenGeneratorInterface $token,
        EncoderFactoryInterface $encoder
    ) {
        $this->repository   = $repository;
        $this->mailer       = $mailer;
        $this->token        = $token;
        $this->encoder      = $encoder;
    }

    /**
     * @param UserInterface $user
     */
    public function onSuccess($user): void
    {
        if(!\is_null($user))
        {
            $passwordEncoder = $this->encoder->getEncoder($user);

            $user->setPassword($passwordEncoder->encodePassword($user->getPassword(), null));

            $user->setToken($this->token->generateToken($user));

            $this->repository->save($user);

            $this->mailer->sendMail($user, 'Votre nouveau mot de passe', 'reset_password');
        }
    }

    /**
     * {@inheritdoc}
     */
    public function getFormType(): String
    {
        return ResetPasswordType::class;
    }
}
