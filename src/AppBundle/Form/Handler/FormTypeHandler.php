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

namespace AppBundle\Form\Handler;

use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class FormTypeHandler.
 */
abstract class FormTypeHandler
{
    /**
     * @var FormInterface
     */
    private $form;

    /**
     * @param Request $request
     * @param $entity
     *
     * @return bool
     */
    public function handle(
        Request $request,
        $entity
    ): bool {

        $form = $this->createForm($entity);

        $form->handleRequest($request);

        $this->form = $form;

        if($form->isSubmitted() && $form->isValid())
        {
            $this::onSuccess($entity);

            return true;
        }

        return false;
    }

    /**
     * @return FormView
     */
    public function createView(): FormView
    {
        return $this->form->createView();
    }

    /**
     * @return FormInterface
     */
    public function returnForm(): FormInterface
    {
        return $this->form;
    }

    /**
     * @param $entity
     */
    abstract public function onSuccess($entity): void;

    /**
     * @param $entity
     *
     * @return FormInterface
     */
    abstract public function createForm($entity): FormInterface;

}
