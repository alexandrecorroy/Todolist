<?php

namespace AppBundle\Controller;

use AppBundle\Entity\User;
use AppBundle\Form\Handler\UserRegistrationTypeHandler;
use AppBundle\Form\Handler\UserUpdateTypeHandler;
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
     * @Route(path="/users", name="user_list")
     *
     * @param UserRepositoryInterface $repository
     *
     * @return Response
     */
    public function listAction(UserRepositoryInterface $repository): Response
    {
        return $this->render('user/list.html.twig', ['users' => $repository->listUsers()]);
    }

    /**
     * @Route(path="/users/create", name="user_create", methods={"GET","POST"})
     *
     * @param Request $request
     * @param UserRegistrationTypeHandler $handler
     *
     * @return Response
     */
    public function createAction(Request $request, UserRegistrationTypeHandler $handler): Response
    {
        $user = new User();

        if ($handler->handle($request, $user)) {

            $this->addFlash('success', "L'utilisateur a bien été ajouté.");

            return $this->redirectToRoute('user_list');
        }

        return $this->render('user/create.html.twig', ['form' => $handler->createView()]);
    }

    /**
     * @Route(path="/users/{id}/edit", name="user_edit", requirements={"id"="\d+"}, methods={"GET","POST"})
     *
     * @param User $user
     * @param Request $request
     * @param UserUpdateTypeHandler $handler
     *
     * @return Response
     */
    public function editAction(User $user, Request $request, UserUpdateTypeHandler $handler): Response
    {
        if ($handler->handle($request, $user)) {

            $this->addFlash('success', "L'utilisateur a bien été modifié");

            return $this->redirectToRoute('user_list');
        }

        return $this->render('user/edit.html.twig', ['form' => $handler->createView(), 'user' => $user]);
    }
}
