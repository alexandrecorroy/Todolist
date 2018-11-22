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
use AppBundle\Form\Handler\Interfaces\TaskAddTypeHandlerInterface;
use AppBundle\Repository\Interfaces\TaskRepositoryInterface;
use Symfony\Component\Form\FormInterface;

/**
 * Class TaskAddTypeTypeHandler.
 */
final class TaskAddTypeTypeHandler implements TaskAddTypeHandlerInterface
{
    /**
     * @var TaskRepositoryInterface
     */
    private $repository;

    /**
     * {@inheritdoc}
     */
    public function __construct(TaskRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * {@inheritdoc}
     */
    public function handle(
        FormInterface $form,
        TaskInterface $task
    ): bool {
        if($form->isSubmitted() && $form->isValid())
        {
            $this->repository->save($task);

            return true;
        }

        return false;
    }

}
