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

namespace AppBundle\Repository\Interfaces;

use AppBundle\Entity\Interfaces\UserInterface;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * Interface UserRepositoryInterface.
 */
interface UserRepositoryInterface
{
    /**
     * UserRepositoryInterface constructor.
     *
     * @param RegistryInterface $registry
     */
    public function __construct(RegistryInterface $registry);

    /**
     * @param UserInterface $user
     */
    public function save(UserInterface $user): void;
}
