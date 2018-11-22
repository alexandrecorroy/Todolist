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
use AppBundle\Form\Handler\Interfaces\UserUpdateTypeHandlerInterface;
use AppBundle\Repository\Interfaces\UserRepositoryInterface;
use AppBundle\Service\Interfaces\MailerInterface;
use Symfony\Component\Form\FormInterface;

final class UserUpdateTypeHandler implements UserUpdateTypeHandlerInterface
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
     * {@inheritdoc}
     */
    public function __construct(
    UserRepositoryInterface $repository,
    MailerInterface $mailer
    ) {
        $this->repository        = $repository;
        $this->mailer            = $mailer;
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
            $this->repository->save($user);

            $this->mailer->sendMail($user, 'Mise à jour de vos identifiants', 'update_user');

            return true;
        }
        return false;
    }
}
