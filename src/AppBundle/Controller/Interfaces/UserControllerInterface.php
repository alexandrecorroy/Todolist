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

use AppBundle\Entity\Interfaces\UserInterface;
use AppBundle\Form\Handler\Interfaces\UserRegistrationTypeHandlerInterface;
use AppBundle\Form\Handler\Interfaces\UserUpdateTypeHandlerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Interface UserControllerInterface.
 */
interface UserControllerInterface
{
    /**
     * @return Response
     */
    public function listAction(): Response;

    /**
     * @param Request $request
     * @param UserRegistrationTypeHandlerInterface $handler
     *
     * @return Response
     */
    public function createAction(Request $request, UserRegistrationTypeHandlerInterface $handler): Response;

    /**
     * @param UserInterface $user
     * @param Request $request
     * @param UserUpdateTypeHandlerInterface $handler
     *
     * @return Response
     */
    public function editAction(UserInterface $user, Request $request, UserUpdateTypeHandlerInterface $handler): Response;
}
