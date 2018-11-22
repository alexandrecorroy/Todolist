<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Task;
use AppBundle\Form\Handler\Interfaces\TaskAddTypeHandlerInterface;
use AppBundle\Form\TaskAddType;
use AppBundle\Repository\Interfaces\TaskRepositoryInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class TaskController.
 */
final class TaskController extends Controller
{
    /**
     * @Route("/tasks", name="task_list", methods={"GET"})
     *
     * {@inheritdoc}
     */
    public function listAction(): Response
    {
        return $this->render('task/list.html.twig', ['tasks' => $this->getDoctrine()->getRepository('AppBundle:Task')->findAll()]);
    }

    /**
     * @Route("/tasks/create", name="task_create", methods={"GET","POST"})
     *
     * {@inheritdoc}
     */
    public function createAction(Request $request, TaskAddTypeHandlerInterface $handler): Response
    {
        $task = new Task();
        $form = $this->createForm(TaskAddType::class, $task);

        $form->handleRequest($request);

        if ($handler->handle($form, $task)) {
            $this->addFlash('success', 'La tâche a été bien été ajoutée.');

            return $this->redirectToRoute('task_list');
        }

        return $this->render('task/create.html.twig', ['form' => $form->createView()]);
    }

    /**
     * @Route("/tasks/{id}/edit", name="task_edit", methods={"GET","POST"})
     *
     * {@inheritdoc}
     */
    public function editAction(Task $task, Request $request, TaskAddTypeHandlerInterface $handler): Response
    {
        $form = $this->createForm(TaskAddType::class, $task);

        $form->handleRequest($request);

        if ($handler->handle($form, $task)) {

            $this->addFlash('success', 'La tâche a bien été modifiée.');

            return $this->redirectToRoute('task_list');
        }

        return $this->render('task/edit.html.twig', [
            'form' => $form->createView(),
            'task' => $task,
        ]);
    }

    /**
     * @Route("/tasks/{id}/toggle", name="task_toggle", methods={"GET"})
     *
     * {@inheritdoc}
     */
    public function toggleTaskAction(Task $task, TaskRepositoryInterface $repository): Response
    {
        $task->toggle(!$task->isDone());

        $repository->flush();

        $this->addFlash('success', sprintf('La tâche %s a bien été marquée comme faite.', $task->getTitle()));

        return $this->redirectToRoute('task_list');
    }

    /**
     * @Route("/tasks/{id}/delete", name="task_delete", methods={"GET"})
     *
     * {@inheritdoc}
     */
    public function deleteTaskAction(Task $task, TaskRepositoryInterface $repository): Response
    {
        $repository->delete($task);

        $this->addFlash('success', 'La tâche a bien été supprimée.');

        return $this->redirectToRoute('task_list');
    }
}
