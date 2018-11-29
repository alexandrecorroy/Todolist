<?php

namespace AppBundle\Controller;

use AppBundle\Form\Handler\Interfaces\ForgotPasswordTypeHandlerInterface;
use AppBundle\Form\Handler\Interfaces\ResetPasswordTypeHandlerInterface;
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
     * @Route("/login", name="login")
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
     * @Route("/forgotPassword", name="forgot_password")
     */
    public function forgotPasswordAction(Request $request, ForgotPasswordTypeHandlerInterface $handler): Response
    {
        $form = $handler->createForm($request);

        if($handler->handle($form))
        {
            $this->addFlash('success', 'Un email a été envoyé pour renouveler votre mot de passe.');

            return $this->redirectToRoute('homepage');
        }

        return $this->render('security/forgot_password.html.twig', ['form' => $form->createView()]);
    }

    /**
     * @Route("/resetPassword/{token}", name="reset_password")
     */
    public function resetPasswordAction(Request $request, ResetPasswordTypeHandlerInterface $handler): Response
    {
        $form = $handler->createForm($request);

        if($handler->handle($form))
        {
            $this->addFlash('success', 'Mot de passe mis à jour.');

            return $this->redirectToRoute('homepage');
        }

        return $this->render('security/reset_password.html.twig', ['form' => $form->createView()]);
    }
}
