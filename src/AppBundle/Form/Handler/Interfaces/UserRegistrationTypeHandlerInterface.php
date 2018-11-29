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
use AppBundle\Service\Interfaces\PasswordGeneratorInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface;

/**
 * Interface UserRegistrationTypeHandlerInterface.
 */
interface UserRegistrationTypeHandlerInterface
{
    /**
     * UserRegistrationTypeHandlerInterface constructor.
     * @param EncoderFactoryInterface $encoder
     * @param UserRepositoryInterface $repository
     * @param PasswordGeneratorInterface $passwordGenerator
     * @param MailerInterface $mailer
     * @param FormFactoryInterface $formFactory
     */
    public function __construct(
        EncoderFactoryInterface $encoder,
        UserRepositoryInterface $repository,
        PasswordGeneratorInterface $passwordGenerator,
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
