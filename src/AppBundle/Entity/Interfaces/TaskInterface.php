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
 * Interface TaskInterface.
 */
interface TaskInterface
{
    /**
     * @return int|null
     */
    public function getId(): ?int;

    /**
     * @return \DateTime
     */
    public function getCreatedAt(): \DateTime;

    /**
     * @param \DateTime $createdAt
     */
    public function setCreatedAt(\DateTime $createdAt): void;

    /**
     * @return string|null
     */
    public function getTitle(): ?string;

    /**
     * @param string $title
     */
    public function setTitle(string $title): void;

    /**
     * @return string|null
     */
    public function getContent(): ?string;

    /**
     * @param string $content
     */
    public function setContent(string $content): void;

    /**
     * @return bool
     */
    public function isDone(): bool;

    /**
     * @param bool $flag
     */
    public function toggle(bool $flag): void;

    /**
     * @return UserInterface|null
     */
    public function getUser(): ?UserInterface;

    /**
     * @param UserInterface $user
     */
    public function setUser(UserInterface $user): void;
}
