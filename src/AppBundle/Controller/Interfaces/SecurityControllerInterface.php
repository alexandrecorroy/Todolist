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

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Interface SecurityControllerInterface.
 */
interface SecurityControllerInterface
{
    /**
     * @param Request $request
     *
     * @return Response
     */
    public function loginAction(Request $request): Response;
}
