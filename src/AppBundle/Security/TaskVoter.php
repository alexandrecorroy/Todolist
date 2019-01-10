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

namespace AppBundle\Security;

use AppBundle\Entity\Interfaces\TaskInterface;
use AppBundle\Entity\Interfaces\UserInterface;
use AppBundle\Entity\Task;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;
/**
 * Class TaskVoter.
 */
final class TaskVoter extends Voter
{
    /**
     * constant DELETE
     */
    const DELETE = 'delete';

    /**
     * @param $attribute
     * @param $subject
     *
     * @return bool
     */
    protected function supports($attribute, $subject)
    {
        if (!in_array($attribute, array(self::DELETE))) {
            return false;

        }

        if (!$subject instanceof TaskInterface) {
            return false;
        }

        return true;
    }

    /**
     * @param string $attribute
     * @param mixed $subject
     * @param TokenInterface $token
     *
     * @return bool
     */
    protected function voteOnAttribute($attribute, $subject, TokenInterface $token)
    {
        $user = $token->getUser();

        if (!$user instanceof UserInterface) {
            return false;
        }

        /** @var Task $task */
        $task = $subject;

        switch ($attribute) {
            case self::DELETE:
                return $this->canDelete($task, $user);
        }

        throw new \LogicException('This code should not be reached!');
    }

    /**
     * @param TaskInterface $task
     * @param UserInterface $user
     *
     * @return bool
     */
    private function canDelete(TaskInterface $task, UserInterface $user)
    {
        if($task->getUser() === $user || (in_array('ROLE_ADMIN', $user->getRoles()) && \is_null($task->getUser())))
        {
            return true;
        }

        return false;
    }


}
