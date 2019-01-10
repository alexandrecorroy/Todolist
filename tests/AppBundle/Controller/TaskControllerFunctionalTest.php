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

namespace Tests\AppBundle\Controller;

use AppBundle\Entity\Task;
use Symfony\Component\HttpFoundation\Response;
use Tests\AppBundle\DataFixtures\DataFixturesTestCase;

/**
 * Class TaskControllerFunctionalTest.
 */
final class TaskControllerFunctionalTest extends DataFixturesTestCase
{
    /**
     * test list pending tasks
     */
    public function testListTaskPending()
    {
        $this::createAuthenticatedRoleUser();

        $this->client->request('GET', '/tasks/pending');

        static::assertEquals(Response::HTTP_OK, $this->client->getResponse()->getStatusCode());
        static::assertTrue($this->client->getResponse()->headers->contains('content-type', 'text/html; charset=UTF-8'));
    }

    /**
     * test list pending done
     */
    public function testListTaskDone()
    {
        $this::createAuthenticatedRoleUser();

        $this->client->request('GET', '/tasks/pending');

        static::assertEquals(Response::HTTP_OK, $this->client->getResponse()->getStatusCode());
        static::assertTrue($this->client->getResponse()->headers->contains('content-type', 'text/html; charset=UTF-8'));
    }

    /**
     * test toggle all task not done
     */
    public function testToggleTask()
    {
        $this::createAuthenticatedRoleUser();

        $tasks = $this->entityManager->getRepository(Task::class)->findAllTask(0);
        $tasksDone = $this->entityManager->getRepository(Task::class)->findAllTask(1);

        foreach ($tasks as $task)
        {
            $this->client->request('GET', '/tasks/'.$task->getId().'/toggle');

            $this->client->followRedirect();



            static::assertEquals(Response::HTTP_OK, $this->client->getResponse()->getStatusCode());
            static::assertTrue($this->client->getResponse()->headers->contains('content-type', 'text/html; charset=UTF-8'));
        }

        $countAllTaskDone = count($tasks)+count($tasksDone);

        $tasks = $this->entityManager->getRepository(Task::class)->findAllTask(1);

        static::assertEquals($countAllTaskDone, count($tasks));
    }

    /**
     * test toggle all task not done with user admin and task admin & anonymous
     */
    public function testDeleteTaskWithAdmin()
    {
        $this::createAuthenticatedRoleAdmin();

        $tasks = $this->entityManager->getRepository(Task::class)->findAllTask(0);

        foreach ($tasks as $task)
        {
            $this->client->request('GET', '/tasks/'.$task->getId().'/delete');

            $this->client->followRedirect();

            static::assertEquals(Response::HTTP_OK, $this->client->getResponse()->getStatusCode());
            static::assertTrue($this->client->getResponse()->headers->contains('content-type', 'text/html; charset=UTF-8'));
        }

        $tasks = $this->entityManager->getRepository(Task::class)->findAllTask(0);

        static::assertEquals(0, count($tasks));
    }

    /**
     * test toggle all task not done with user and task admin & anonymous
     */
    public function testDeleteTaskWithUser()
    {
        $this::createAuthenticatedRoleUser();

        $tasks = $this->entityManager->getRepository(Task::class)->findAllTask(0);

        $countTaskStart = count($tasks);

        foreach ($tasks as $task)
        {
            $this->client->request('GET', '/tasks/'.$task->getId().'/delete');

            static::assertEquals(Response::HTTP_FORBIDDEN, $this->client->getResponse()->getStatusCode());
            static::assertTrue($this->client->getResponse()->headers->contains('content-type', 'text/html; charset=UTF-8'));
        }

        $tasksEnd = $this->entityManager->getRepository(Task::class)->findAllTask(0);

        static::assertEquals($countTaskStart, count($tasksEnd));
    }

    /**
     * test add a new task
     */
    public function testCreateTask()
    {
        $this::createAuthenticatedRoleUser();

        $countTasksBeforeAdd = count($this->entityManager->getRepository(Task::class)->findAllTask(0));

        $crawler = $this->client->request('GET', '/tasks/create');

        static::assertEquals(Response::HTTP_OK, $this->client->getResponse()->getStatusCode());

        $buttonCrawlerNode = $crawler->selectButton('Ajouter');

        $form = $buttonCrawlerNode->form(array(
            'task_add[title]'    => 'Test Title',
            'task_add[content]' => 'Content More More More More long Test',
        ), 'POST');

        $this->client->submit($form);

        $this->client->followRedirect();

        static::assertEquals(Response::HTTP_OK, $this->client->getResponse()->getStatusCode());
        static::assertEquals($countTasksBeforeAdd+1, count($this->entityManager->getRepository(Task::class)->findAllTask(0)));

    }

    /**
     * test edit a task
     */
    public function testEditTask()
    {
        $this::createAuthenticatedRoleUser();

        $tasksNotDone = $this->entityManager->getRepository(Task::class)->findAllTask(1);


        foreach ($tasksNotDone as $task) {
            $crawler = $this->client->request('GET', '/tasks/'.$task->getId().'/edit');

            static::assertEquals(Response::HTTP_OK, $this->client->getResponse()->getStatusCode());

            $buttonCrawlerNode = $crawler->selectButton('Modifier');

            $form = $buttonCrawlerNode->form(array(
                'task_add[title]'    => 'New Title',
                'task_add[content]' => 'Content More More More More long Test',
            ), 'POST');

            $this->client->submit($form);

            $this->client->followRedirect();

            $crawler = $this->client->request('GET', '/tasks/'.$task->getId().'/edit');

            static::assertEquals(Response::HTTP_OK, $this->client->getResponse()->getStatusCode());

            static::assertGreaterThan(0, $crawler->filter('input[value="New Title"]')->count());
            static::assertGreaterThan(0, $crawler->filter('textarea:contains("Content More More More More long Test")')->count());

            break;
        }
    }
}
