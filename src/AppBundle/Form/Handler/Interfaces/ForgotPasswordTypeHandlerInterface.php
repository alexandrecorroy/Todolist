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

namespace AppBundle\Form\Handler\Interfaces;

use AppBundle\Repository\Interfaces\UserRepositoryInterface;
use AppBundle\Service\Interfaces\MailerInterface;
use AppBundle\Service\TokenGenerator;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * Interface ForgotPasswordTypeHandlerInterface.
 */
interface ForgotPasswordTypeHandlerInterface
{
    /**
     * ForgotPasswordTypeHandlerInterface constructor.
     *
     * @param UserRepositoryInterface $repository
     * @param FormFactoryInterface $form
     * @param MailerInterface $mailer
     * @param TokenGenerator $token
     */
    public function __construct(
        UserRepositoryInterface $repository,
        FormFactoryInterface $form,
        MailerInterface $mailer,
        TokenGenerator $token
    );

    /**
     * @param FormInterface $form
     *
     * @return bool
     */
    public function handle(
        FormInterface $form
    ): bool;

    /**
     * @param Request $request
     *
     * @return FormInterface
     */
    public function createForm(
        Request $request
    ): FormInterface;
}
