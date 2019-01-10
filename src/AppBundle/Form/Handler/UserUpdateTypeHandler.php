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
use AppBundle\Form\UserRegistrationType;
use AppBundle\Repository\Interfaces\UserRepositoryInterface;
use AppBundle\Service\Interfaces\MailerInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\FormInterface;

/**
 * Class UserUpdateTypeHandler.
 */
final class UserUpdateTypeHandler extends FormTypeHandler
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
     * UserUpdateTypeHandler constructor.
     *
     * @param UserRepositoryInterface $repository
     * @param MailerInterface $mailer
     */
    public function __construct(
        UserRepositoryInterface $repository,
        MailerInterface $mailer
    ) {
        $this->repository  = $repository;
        $this->mailer      = $mailer;
    }

    /**
     * @param UserInterface $user
     */
    public function onSuccess($user): void
    {
        $this->repository->save($user);

        $this->mailer->sendMail($user, 'Mise à jour de vos identifiants', 'update_user');
    }

    /**
     * {@inheritdoc}
     */
    public function getFormType(): String
    {
        return UserRegistrationType::class;
    }
}
