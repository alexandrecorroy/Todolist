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

namespace AppBundle\Repository\Interfaces;

use AppBundle\Entity\Interfaces\TaskInterface;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * Interface TaskRepositoryInterface.
 */
interface TaskRepositoryInterface
{
    /**
     * TaskRepositoryInterface constructor.
     *
     * @param RegistryInterface $registry
     */
    public function __construct(RegistryInterface $registry);

    /**
     * @param TaskInterface $task
     */
    public function save(TaskInterface $task): void;

    /**
     * @param TaskInterface $task
     */
    public function delete(TaskInterface $task): void;

    /**
     * save to bdd
     */
    public function flush(): void;
}
