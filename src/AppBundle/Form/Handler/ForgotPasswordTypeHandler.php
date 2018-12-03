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

use AppBundle\Form\ForgotPasswordType;
use AppBundle\Form\Handler\Interfaces\ForgotPasswordTypeHandlerInterface;
use AppBundle\Repository\Interfaces\UserRepositoryInterface;
use AppBundle\Service\Interfaces\MailerInterface;
use AppBundle\Service\Interfaces\TokenGeneratorInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class ForgotPasswordTypeHandler.
 */
final class ForgotPasswordTypeHandler implements ForgotPasswordTypeHandlerInterface
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
     * @var TokenGeneratorInterface
     */
    private $token;

    /**
     * {@inheritdoc}
     */
    public function __construct(
        UserRepositoryInterface $repository,
        FormFactoryInterface $form,
        MailerInterface $mailer,
        TokenGeneratorInterface $token
    ) {
        $this->repository   = $repository;
        $this->form         = $form;
        $this->mailer       = $mailer;
        $this->token        = $token;
    }

    /**
     * {@inheritdoc}
     */
    public function handle(
        FormInterface $form
    ): bool {
        if($form->isSubmitted() && $form->isValid())
        {
            $user = $this->repository->getUserByEmail($form->getData()['email']);

            if(!\is_null($user))
            {
                $user->setToken($this->token->generateToken($user));

                $this->repository->save($user);

                $this->mailer->sendMail($user, 'Mot de passe oublié', 'forgot_password');
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

        $form = $this->form->create(ForgotPasswordType::class);

        return $form->handleRequest($request);
    }
}
