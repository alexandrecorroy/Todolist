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

use AppBundle\Form\Handler\Interfaces\ResetPasswordTypeHandlerInterface;
use AppBundle\Form\ResetPasswordType;
use AppBundle\Repository\Interfaces\UserRepositoryInterface;
use AppBundle\Service\Interfaces\MailerInterface;
use AppBundle\Service\TokenGenerator;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface;

/**
 * Class ResetPasswordTypeHandler.
 */
final class ResetPasswordTypeHandler implements ResetPasswordTypeHandlerInterface
{
    /**
     * @var UserRepositoryInterface
     */
    private $repository;

    /**
     * @var FormFactoryInterface
     */
    private $form;

    /**
     * @var MailerInterface
     */
    private $mailer;

    /**
     * @var TokenGenerator
     */
    private $token;

    /**
     * @var EncoderFactoryInterface
     */
    private $encoder;

    /**
     * {@inheritdoc}
     */
    public function __construct(
        UserRepositoryInterface $repository,
        FormFactoryInterface $form,
        MailerInterface $mailer,
        TokenGenerator $token,
        EncoderFactoryInterface $encoder
    ) {
        $this->repository   = $repository;
        $this->form         = $form;
        $this->mailer       = $mailer;
        $this->token        = $token;
        $this->encoder      = $encoder;
    }

    /**
     * {@inheritdoc}
     */
    public function handle(
        FormInterface $form
    ): bool {
        if($form->isSubmitted() && $form->isValid())
        {
            $user = $this->repository->getUserByToken($form->getData()['token']);

            if(!\is_null($user))
            {
                $passwordEncoder = $this->encoder->getEncoder($user);

                $user->setPassword($passwordEncoder->encodePassword($form->getData()['password'], null));

                $user->setToken($this->token->generateToken($user));

                $this->repository->save($user);

                $this->mailer->sendMail($user, 'Votre nouveau mot de passe', 'reset_password');
            }

            return true;
        }

        return false;
    }

    /**
     * {@inheritdoc}
     */
    public function createForm(
        Request $request
    ): FormInterface {

        $form = $this->form->create(ResetPasswordType::class);

        return $form->handleRequest($request);
    }
}
