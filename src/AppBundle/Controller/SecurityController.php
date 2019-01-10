<?php

namespace AppBundle\Controller;

use AppBundle\Entity\User;
use AppBundle\Form\Handler\ForgotPasswordTypeHandler;
use AppBundle\Form\Handler\ResetPasswordTypeHandler;
use AppBundle\Repository\Interfaces\UserRepositoryInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class SecurityController.
 */
final class SecurityController extends Controller
{
    /**
     * @Route(path="/login", name="login", methods={"GET","POST"})
     *
     * @param Request $request
     * @return Response
     */
    public function loginAction(Request $request): Response
    {
        $authenticationUtils = $this->get('security.authentication_utils');

        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', array(
            'last_username' => $lastUsername,
            'error'         => $error,
        ));
    }

    /**
     * @Route(path="/forgotPassword", name="forgot_password", methods={"GET","POST"})
     *
     * @param Request $request
     * @param ForgotPasswordTypeHandler $handler
     * @param UserRepositoryInterface $repository
     *
     * @return Response
     */
    public function forgotPasswordAction(Request $request, ForgotPasswordTypeHandler $handler, UserRepositoryInterface $repository): Response
    {
        if($handler->handle($request, $repository->getUserByEmail($request->request->get('forgot_password')['email'])))
        {
            $this->addFlash('success', 'Un email a été envoyé pour renouveler votre mot de passe.');

            return $this->redirectToRoute('homepage');
        }

        return $this->render('security/forgot_password.html.twig', ['form' => $handler->createView()]);
    }

    /**
     * @Route(path="/resetPassword/{token}", name="reset_password", methods={"GET","POST"})
     *
     * @param User $user
     * @param Request $request
     * @param ResetPasswordTypeHandler $handler
     *
     * @return Response
     */
    public function resetPasswordAction(User $user, Request $request, ResetPasswordTypeHandler $handler): Response
    {
        if($handler->handle($request, $user))
        {
            $this->addFlash('success', 'Mot de passe mis à jour.');

            return $this->redirectToRoute('homepage');
        }

        return $this->render('security/reset_password.html.twig', ['form' => $handler->createView()]);
    }
}
