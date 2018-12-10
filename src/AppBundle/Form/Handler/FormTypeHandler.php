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

use Doctrine\Common\Annotations\Annotation\Required;
use Symfony\Component\Form\FormFactoryInterface;
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
     * @var FormFactoryInterface
     */
    private $formFactory;

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

        $this->form = $this->formFactory->create($this->getFormType(), $entity);

        $this->form->handleRequest($request);

        if($this->form->isSubmitted() && $this->form->isValid())
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
     * @Required
     * @param FormFactoryInterface $formFactory
     */
    public function getFormFactory(FormFactoryInterface $formFactory)
    {
        $this->formFactory = $formFactory;
    }

    /**
     * @param $entity
     */
    abstract public function onSuccess($entity): void;

    /**
     * @return String
     */
    abstract public function getFormType(): String;

}
