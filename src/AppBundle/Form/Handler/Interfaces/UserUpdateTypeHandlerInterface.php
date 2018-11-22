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
use Symfony\Component\Form\FormInterface;

/**
 * Interface UserUpdateTypeHandler.
 */
interface UserUpdateTypeHandlerInterface
{
    /**
     * UserUpdateTypeHandler constructor.
     *
     * @param UserRepositoryInterface $repository
     * @param MailerInterface $mailer
     */
    public function __construct(
        UserRepositoryInterface $repository,
        MailerInterface $mailer
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
}
