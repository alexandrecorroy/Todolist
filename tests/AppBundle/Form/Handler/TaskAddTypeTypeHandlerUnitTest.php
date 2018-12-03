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

namespace Tests\AppBundle\Form\Handler;

use AppBundle\Form\Handler\Interfaces\TaskAddTypeHandlerInterface;
use AppBundle\Form\Handler\TaskAddTypeTypeHandler;
use AppBundle\Repository\Interfaces\TaskRepositoryInterface;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

/**
 * Class TaskAddTypeTypeHandlerUnitTest.
 */
final class TaskAddTypeTypeHandlerUnitTest extends TestCase
{
    /**
     * @var TaskRepositoryInterface|null
     */
    private $repository = null;

    /**
     * @var TokenStorageInterface|null
     */
    private $tokenStorage = null;

    /**
     * @var FormFactoryInterface|null
     */
    private $formFactory = null;

    /**
     * {@inheritdoc}
     */
    public function setUp()
    {
        $this->repository   = $this->createMock(TaskRepositoryInterface::class);
        $this->tokenStorage = $this->createMock(TokenStorageInterface::class);
        $this->formFactory  = $this->createMock(FormFactoryInterface::class);
    }

    /**
     * test implement interface
     */
    public function testImplementInterface()
    {
        $class = new TaskAddTypeTypeHandler(
            $this->repository,
            $this->tokenStorage,
            $this->formFactory
        );

        static::assertInstanceOf(TaskAddTypeHandlerInterface::class, $class);
    }
}
