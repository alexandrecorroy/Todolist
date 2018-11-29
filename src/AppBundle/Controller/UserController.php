<?php

namespace AppBundle\Controller;

use AppBundle\Entity\User;
use AppBundle\Form\Handler\Interfaces\UserRegistrationTypeHandlerInterface;
use AppBundle\Form\Handler\Interfaces\UserUpdateTypeHandlerInterface;
use AppBundle\Repository\Interfaces\UserRepositoryInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class UserController.
 */
final class UserController extends Controller
{
    /**
     * @Route("/users", name="user_list")
     *
     * {@inheritdoc}
     */
    public function listAction(UserRepositoryInterface $repository): Response
    {
        return $this->render('user/list.html.twig', ['users' => $repository->listUsers()]);
    }

    /**
     * @Route("/users/create", name="user_create", methods={"GET","POST"})
     *
     * {@inheritdoc}
     */
    public function createAction(Request $request, UserRegistrationTypeHandlerInterface $handler): Response
    {
        $user = new User();

        $form = $handler->createForm($request, $user);

        if ($handler->handle($form, $user)) {

            $this->addFlash('success', "L'utilisateur a bien été ajouté.");

            return $this->redirectToRoute('user_list');
        }

        return $this->render('user/create.html.twig', ['form' => $form->createView()]);
    }

    /**
     * @Route("/users/{id}/edit", name="user_edit", requirements={"id"="\d+"}, methods={"GET","POST"})
     *
     * {@inheritdoc}
     */
    public function editAction(User $user, Request $request, UserUpdateTypeHandlerInterface $handler): Response
    {
        $form = $handler->createForm($request, $user);

        if ($handler->handle($form, $user)) {

            $this->addFlash('success', "L'utilisateur a bien été modifié");

            return $this->redirectToRoute('user_list');
        }

        return $this->render('user/edit.html.twig', ['form' => $form->createView(), 'user' => $user]);
    }
}
