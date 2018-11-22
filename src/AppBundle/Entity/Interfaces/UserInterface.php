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

namespace AppBundle\Entity\Interfaces;

/**
 * Interface UserInterface.
 */
interface UserInterface extends \Symfony\Component\Security\Core\User\UserInterface
{
    /**
     * @return int|null
     */
    public function getId(): ?int;

    /**
     * @return string|null
     */
    public function getUsername(): ?string;

    /**
     * @param $username
     */
    public function setUsername($username): void;

    /**
     * @return string|null
     */
    public function getPassword(): ?string;

    /**
     * @param $password
     */
    public function setPassword($password): void;

    /**
     * @return string|null
     */
    public function getEmail(): ?string;

    /**
     * @param $email
     */
    public function setEmail($email): void;

    /**
     * @return array
     */
    public function getRoles(): array;

    /**
     * @return bool
     */
    public function getIsAdmin(): bool;

    /**
     * @param bool $isAdmin
     */
    public function setIsAdmin(bool $isAdmin): void;
}
