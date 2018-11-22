<?php

namespace AppBundle\Entity;

use AppBundle\Entity\Interfaces\TaskInterface;
use AppBundle\Entity\Interfaces\UserInterface;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table
 */
final class Task implements TaskInterface
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank(message="Vous devez saisir un titre.")
     */
    private $title;

    /**
     * @ORM\Column(type="text")
     * @Assert\NotBlank(message="Vous devez saisir du contenu.")
     */
    private $content;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isDone;

    /**
     * Many features have one product. This is the owning side.
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User", inversedBy="tasks")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;

    /**
     * Task constructor.
     */
    public function __construct()
    {
        $this->createdAt = new \Datetime();
        $this->isDone = false;
    }

    /**
     * {@inheritdoc}
     */
    public function addUser(UserInterface $user)
    {
        $this->user = $user;
    }

    /**
     * {@inheritdoc}
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }

    /**
     * {@inheritdoc}
     */
    public function setCreatedAt($createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    /**
     * {@inheritdoc}
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * {@inheritdoc}
     */
    public function setTitle($title): void
    {
        $this->title = $title;
    }

    /**
     * {@inheritdoc}
     */
    public function getContent(): ?string
    {
        return $this->content;
    }

    /**
     * {@inheritdoc}
     */
    public function setContent($content): void
    {
        $this->content = $content;
    }

    /**
     * {@inheritdoc}
     */
    public function isDone(): bool
    {
        return $this->isDone;
    }

    /**
     * {@inheritdoc}
     */
    public function toggle($flag): void
    {
        $this->isDone = $flag;
    }
}
