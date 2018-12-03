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

namespace Tests\AppBundle\Entity;

use AppBundle\Entity\Interfaces\TaskInterface;
use AppBundle\Entity\Interfaces\UserInterface;
use AppBundle\Entity\Task;
use PHPUnit\Framework\TestCase;

/**
 * Class TaskUnitTest.
 */
final class TaskUnitTest extends TestCase
{
    /**
     * @var UserInterface|null
     */
    private $user = null;

    /**
     * {@inheritdoc}
     */
    public function setUp()
    {
        $this->user = $this->createMock(UserInterface::class);
    }

    /**
     * test add Task
     */
    public function testAddTask()
    {
     $task = new Task();
        $task->setTitle('Title');
        $task->setContent('Content');
        $task->setUser($this->user);

        static::assertInstanceOf(TaskInterface::class, $task);
        static::assertInstanceOf(UserInterface::class, $task->getUser());
        static::assertInstanceOf(\DateTime::class, $task->getCreatedAt());
        static::assertEquals("Title", $task->getTitle());
        static::assertEquals("Content", $task->getContent());
        static::assertEquals(false, $task->isDone());

        $task->toggle(true);

        static::assertEquals(true, $task->isDone());
    }
}
