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

use AppBundle\Entity\Interfaces\TaskInterface;
use AppBundle\Form\TaskAddType;
use AppBundle\Repository\Interfaces\TaskRepositoryInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

/**
 * Class TaskTypeTypeHandler.
 */
final class TaskTypeHandler extends FormTypeHandler
{
    /**
     * @var TaskRepositoryInterface
     */
    private $repository;

    /**
     * @var TokenStorageInterface
     */
    private $tokenStorage;

    /**
     * TaskTypeHandler constructor.
     *
     * @param TaskRepositoryInterface $repository
     * @param TokenStorageInterface $tokenStorage
     */
    public function __construct(
        TaskRepositoryInterface $repository,
        TokenStorageInterface $tokenStorage
    ) {
        $this->repository   = $repository;
        $this->tokenStorage = $tokenStorage;
    }

    /**
     * @param TaskInterface $task
     */
    public function onSuccess($task): void
    {
        if ($this->repository->isNewEntity($task)) {
            $task->setUser($this->tokenStorage->getToken()->getUser());
        }

        $this->repository->save($task);
    }

    /**
     * {@inheritdoc}
     */
    public function getFormType(): String
    {
        return TaskAddType::class;
    }
}
