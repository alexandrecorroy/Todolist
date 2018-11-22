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

namespace AppBundle\Controller\Interfaces;

use AppBundle\Entity\Task;
use AppBundle\Form\Handler\Interfaces\TaskAddTypeHandlerInterface;
use AppBundle\Repository\Interfaces\TaskRepositoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Interface TaskControllerInterface.
 */
interface TaskControllerInterface
{
    /**
     * @return Response
     */
    public function listAction(): Response;

    /**
     * @param Request $request
     * @param TaskAddTypeHandlerInterface $handler
     *
     * @return Response
     */
    public function createAction(Request $request, TaskAddTypeHandlerInterface $handler): Response;

    /**
     * @param Task $task
     * @param Request $request
     * @param TaskAddTypeHandlerInterface $handler
     *
     * @return Response
     */
    public function editAction(Task $task, Request $request, TaskAddTypeHandlerInterface $handler): Response;

    /**
     * @param Task $task
     * @param TaskRepositoryInterface $repository
     *
     * @return Response
     */
    public function toggleTaskAction(Task $task, TaskRepositoryInterface $repository): Response;

    /**
     * @param Task $task
     * @param TaskRepositoryInterface $repository
     *
     * @return Response
     */
    public function deleteTaskAction(Task $task, TaskRepositoryInterface $repository): Response;
}
