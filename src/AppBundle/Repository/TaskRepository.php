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

namespace AppBundle\Repository;

use AppBundle\Entity\Interfaces\TaskInterface;
use AppBundle\Entity\Task;
use AppBundle\Repository\Interfaces\TaskRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * Class TaskRepository.
 */
final class TaskRepository extends ServiceEntityRepository implements TaskRepositoryInterface
{
    /**
     * {@inheritdoc}
     */
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Task::class);
    }

    /**
     * {@inheritdoc}
     */
    public function save(TaskInterface $task): void
    {
        if(\is_null($task->getId()))
        {
            $this->_em->persist($task);
        }
        $this::flush();
    }

    /**
     * {@inheritdoc}
     */
    public function flush(): void
    {
        $this->_em->flush();
    }

    /**
     * {@inheritdoc}
     */
    public function delete(TaskInterface $task): void
    {
        dump($task);
        die;
        $this->_em->remove($task);
        $this::flush();
    }
}
