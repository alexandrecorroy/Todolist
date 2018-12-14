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

use Doctrine\Common\Collections\ArrayCollection;

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
    public function setUsername(string $username): void;

    /**
     * @return string|null
     */
    public function getPassword(): ?string;

    /**
     * @param $password
     */
    public function setPassword(string $password): void;

    /**
     * @return string|null
     */
    public function getEmail(): ?string;

    /**
     * @param $email
     */
    public function setEmail(string $email): void;

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

    /**
     * @param string $token
     */
    public function setToken(string $token): void;

    /**
     * @return string
     */
    public function getToken(): string;

    /**
     * @return ArrayCollection
     */
    public function getTasks(): ArrayCollection;
}
