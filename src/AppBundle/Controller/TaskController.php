<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Task;
use AppBundle\Form\Handler\TaskTypeHandler;
use AppBundle\Repository\Interfaces\TaskRepositoryInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class TaskController.
 */
final class TaskController extends Controller
{
    /**
     * @Route(path="/tasks/pending", name="task_list_not_done", methods={"GET"})
     *
     * @param TaskRepositoryInterface $repository
     *
     * @return Response
     */
    public function listTaskNotDoneAction(TaskRepositoryInterface $repository): Response
    {
        return $this->render('task/list.html.twig', ['tasks' => $repository->findAllTask(0)]);
    }

    /**
     * @Route(path="/tasks/done", name="task_list_done", methods={"GET"})
     *
     * @param TaskRepositoryInterface $repository
     *
     * @return Response
     */
    public function listTaskDoneAction(TaskRepositoryInterface $repository): Response
    {
        return $this->render('task/list.html.twig', ['tasks' => $repository->findAllTask(1)]);
    }

    /**
     * @Route(path="/tasks/create", name="task_create", methods={"GET","POST"})
     *
     * @param Request $request
     * @param TaskTypeHandler $handler
     *
     * @return Response
     */
    public function createAction(Request $request, TaskTypeHandler $handler): Response
    {
        if ($handler->handle($request, new Task())) {
            $this->addFlash('success', 'La tâche a été bien été ajoutée.');

            return $this->redirectToRoute('task_list_not_done');
        }

        return $this->render('task/create.html.twig', ['form' => $handler->createView()]);
    }

    /**
     * @Route(path="/tasks/{id}/edit", name="task_edit", methods={"GET","POST"})
     *
     * @param Task $task
     * @param Request $request
     * @param TaskTypeHandler $handler
     *
     * @return Response
     */
    public function editAction(Task $task, Request $request, TaskTypeHandler $handler): Response
    {
        if ($handler->handle($request, $task)) {

            $this->addFlash('success', 'La tâche a bien été modifiée.');

            return $this->redirectToRoute('task_list_not_done');
        }

        return $this->render('task/edit.html.twig', [
            'form' => $handler->createView(),
            'task' => $task,
        ]);
    }

    /**
     * @Route(path="/tasks/{id}/toggle", name="task_toggle", methods={"GET"})
     *
     * @param Task $task
     * @param TaskRepositoryInterface $repository
     *
     * @return Response
     */
    public function toggleTaskAction(Task $task, TaskRepositoryInterface $repository): Response
    {
        $task->toggle(!$task->isDone());

        $repository->flush();

        $this->addFlash('success', sprintf('La tâche %s a bien été marquée comme faite / ou non terminée.', $task->getTitle()));

        return $this->redirectToRoute('task_list_not_done');
    }

    /**
     * @Route(path="/tasks/{id}/delete", name="task_delete", methods={"GET"})
     * @IsGranted("delete", subject="task")
     *
     * @param Task $task
     * @param TaskRepositoryInterface $repository
     *
     * @return Response
     */
    public function deleteTaskAction(Task $task, TaskRepositoryInterface $repository): Response
    {
        $repository->delete($task);

        $this->addFlash('success', 'La tâche a bien été supprimée.');

        return $this->redirectToRoute('task_list_not_done');
    }
}
