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
use Doctrine\ORM\UnitOfWork;
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
    public function isNewEntity(TaskInterface $task): bool
    {
        return UnitOfWork::STATE_NEW === $this->_em->getUnitOfWork()->getEntityState($task);
    }

    /**
     * {@inheritdoc}
     */
    public function save(TaskInterface $task): void
    {
        if($this::isNewEntity($task))
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
        $this->_em->remove($task);
        $this::flush();
    }

    /**
     * @param int $isDone
     *
     * @return array|null
     */
    public function findAllTask($isDone): ?array
    {
        $query = $this->createQueryBuilder('t')
            ->where('t.isDone = :isDone')
            ->setParameters([
                'isDone' => $isDone
            ])
            ->getQuery();

        $query->useResultCache(true, 3600, 'findAllTask'.$isDone);

        return $query->getResult();
    }
}
