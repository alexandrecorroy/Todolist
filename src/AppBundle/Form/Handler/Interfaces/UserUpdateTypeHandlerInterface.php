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

use AppBundle\Entity\Interfaces\UserInterface;
use AppBundle\Repository\Interfaces\UserRepositoryInterface;
use AppBundle\Service\Interfaces\MailerInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * Interface UserUpdateTypeHandler.
 */
interface UserUpdateTypeHandlerInterface
{
    /**
     * UserUpdateTypeHandlerInterface constructor.
     *
     * @param UserRepositoryInterface $repository
     * @param MailerInterface $mailer
     * @param FormFactoryInterface $formFactory
     */
    public function __construct(
        UserRepositoryInterface $repository,
        MailerInterface $mailer,
        FormFactoryInterface $formFactory
    );

    /**
     * @param FormInterface $form
     * @param UserInterface $user
     *
     * @return bool
     */
    public function handle(
        FormInterface $form,
        UserInterface $user
    ): bool;

    /**
     * @param Request $request
     * @param UserInterface $user
     *
     * @return FormInterface
     */
    public function createForm(
        Request $request,
        UserInterface $user
    ): FormInterface;
}
