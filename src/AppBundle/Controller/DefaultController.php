<?php

namespace AppBundle\Controller;

use AppBundle\Controller\Interfaces\DefaultControllerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class DefaultController.
 */
final class DefaultController extends Controller implements DefaultControllerInterface
{
    /**
     * @Route("/", name="homepage")
     *
     * {@inheritdoc}
     */
    public function indexAction(): Response
    {
        return $this->render('default/index.html.twig');
    }
}
