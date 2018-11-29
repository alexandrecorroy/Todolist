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

use AppBundle\Entity\Interfaces\TaskInterface;
use AppBundle\Form\Handler\Interfaces\TaskAddTypeHandlerInterface;
use AppBundle\Form\TaskAddType;
use AppBundle\Repository\Interfaces\TaskRepositoryInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

/**
 * Class TaskAddTypeTypeHandler.
 */
final class TaskAddTypeTypeHandler implements TaskAddTypeHandlerInterface
{
    /**
     * @var TaskRepositoryInterface
     */
    private $repository;

    /**
     * @var TokenStorageInterface
     */
    private $tokenStorage;

    /**
     * @var FormFactoryInterface
     */
    private $form;

    /**
     * {@inheritdoc}
     */
    public function __construct(
        TaskRepositoryInterface $repository,
        TokenStorageInterface $tokenStorage,
        FormFactoryInterface $form
    ) {
        $this->repository   = $repository;
        $this->tokenStorage = $tokenStorage;
        $this->form         = $form;
    }

    /**
     * {@inheritdoc}
     */
    public function handle(
        FormInterface $form,
        TaskInterface $task
    ): bool {
        if($form->isSubmitted() && $form->isValid())
        {
            if(!\is_int($task->getId()))
            {
                $task->setUser($this->tokenStorage->getToken()->getUser());
            }

            $this->repository->save($task);

            return true;
        }

        return false;
    }

    /**
     * {@inheritdoc}
     */
    public function createForm(
        Request $request,
        TaskInterface $task
    ): FormInterface {
        $form = $this->form->create(TaskAddType::class, $task);

        return $form->handleRequest($request);
    }

}
