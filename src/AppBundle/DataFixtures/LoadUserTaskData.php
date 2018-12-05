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

namespace AppBundle\DataFixtures;

use AppBundle\Entity\Task;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Class LoadUserTaskData.
 */
final class LoadUserTaskData extends Fixture
{
    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager)
    {
        $task = new Task();
        $task->setTitle('task1');
        $task->setContent('Content1');
        $task->setUser($this->getReference(LoadUserData::ADMIN_REFERENCE));

        $manager->persist($task);

        $task2 = new Task();
        $task2->setTitle('task2');
        $task2->setContent('Content2');
        $task2->toggle(true);
        $task2->setUser($this->getReference(LoadUserData::USER_REFERENCE));

        $manager->persist($task2);

        $task3 = new Task();
        $task3->setTitle('task3');
        $task3->setContent('Content3');

        $manager->persist($task3);

        $manager->flush();
    }
}
