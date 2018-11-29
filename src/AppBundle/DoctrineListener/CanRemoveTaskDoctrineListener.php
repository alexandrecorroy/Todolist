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

namespace AppBundle\DoctrineListener;

use AppBundle\Entity\Task;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

/**
 * Class CanRemoveTaskDoctrineListener.
 */
final class CanRemoveTaskDoctrineListener
{
    /**
     * @var TokenStorageInterface
     */
    private $tokenStorage;

    /**
     * CanRemoveTaskDoctrineListener constructor.
     *
     * @param TokenStorageInterface $tokenStorage
     */
    public function __construct(TokenStorageInterface $tokenStorage)
    {
        $this->tokenStorage     = $tokenStorage;
    }

    /**
     * @param LifecycleEventArgs $args
     */
    public function preRemove(LifecycleEventArgs $args)
    {
        $task = $args->getObject();

        if (!$task instanceof Task) {
            return;
        }

        if($task->getUser() === $this->tokenStorage->getToken()->getUser() || (in_array('ROLE_ADMIN', $this->tokenStorage->getToken()->getUser()->getRoles()) && \is_null($task->getUser()))) {
            return;
        }
        throw new AccessDeniedException();
    }
}
