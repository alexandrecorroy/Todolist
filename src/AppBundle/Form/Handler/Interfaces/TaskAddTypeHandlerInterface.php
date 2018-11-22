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

namespace AppBundle\Form\Handler\Interfaces;

use AppBundle\Entity\Interfaces\TaskInterface;
use AppBundle\Repository\Interfaces\TaskRepositoryInterface;
use Symfony\Component\Form\FormInterface;

/**
 * Interface TaskAddTypeHandlerInterface.
 */
interface TaskAddTypeHandlerInterface
{
    /**
     * TaskAddTypeHandlerInterface constructor.
     *
     * @param TaskRepositoryInterface $repository
     */
    public function __construct(
        TaskRepositoryInterface $repository
    );

    /**
     * @param FormInterface $form
     * @param TaskInterface $user
     *
     * @return bool
     */
    public function handle(
        FormInterface $form,
        TaskInterface $user
    ): bool;
}
