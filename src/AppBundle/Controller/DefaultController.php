<?php

namespace AppBundle\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class DefaultController.
 */
final class DefaultController extends Controller
{
    /**
     * @Route(path="/", name="homepage", methods={"GET"})
     *
     * @return Response
     */
    public function indexAction(): Response
    {
        $response = $this->render('default/index.html.twig');

        return $response->setSharedMaxAge(7200);
    }
}
