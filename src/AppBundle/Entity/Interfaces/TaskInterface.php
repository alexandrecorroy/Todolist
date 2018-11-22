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
     * @return string
     */
    public function getCreatedAt(): string;

    /**
     * @param $createdAt
     */
    public function setCreatedAt($createdAt): void;

    /**
     * @return string|null
     */
    public function getTitle(): ?string;

    /**
     * @param $title
     */
    public function setTitle($title): void;

    /**
     * @return string|null
     */
    public function getContent(): ?string;

    /**
     * @param $content
     */
    public function setContent($content): void;

    /**
     * @return bool
     */
    public function isDone(): bool;

    /**
     * @param $flag
     */
    public function toggle($flag): void;
}
