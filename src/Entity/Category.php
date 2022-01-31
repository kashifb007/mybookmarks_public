<?php

namespace App\Entity;

use App\Repository\CategoryRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CategoryRepository::class)
 */
class Category
{
    const STATUS_LIVE = 'live';
    const STATUS_TRASH = 'trash';
    const STATUS_DELETED = 'deleted';
    const STATUS_BASE = 'base';

    const VISIBILITY_PUBLIC = 'public';
    const VISIBILITY_PRIVATE = 'private';
    const VISIBILITY_SHARED = 'shared';
    const VISIBILITY_FRIENDS = 'friends';

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="bigint", nullable=true)
     */
    private $parentCategoryId;

    /**
     * @ORM\Column(type="string", length=128)
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $status;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $sortOrder;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $visibility;

    /**
     * @ORM\Column(type="string", length=2000, nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private $updatedAt;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="categories")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    public function __construct()
    {
        $this->status = self::STATUS_LIVE;
        $this->visibility = self::VISIBILITY_PRIVATE;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getParentCategoryId(): ?string
    {
        return $this->parentCategoryId;
    }

    public function setParentCategoryId(?string $parentCategoryId): self
    {
        $this->parentCategoryId = $parentCategoryId;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        if (!in_array($status, array(self::STATUS_LIVE, self::STATUS_TRASH, self::STATUS_DELETED, self::STATUS_BASE))) {
            throw new \InvalidArgumentException("Invalid status");
        }
        $this->status = $status;

        return $this;
    }

    public function getSortOrder(): ?int
    {
        return $this->sortOrder;
    }

    public function setSortOrder(?int $sortOrder): self
    {
        $this->sortOrder = $sortOrder;

        return $this;
    }

    public function getVisibility(): ?string
    {
        return $this->visibility;
    }

    public function setVisibility(string $visibility): self
    {
        if (!in_array($visibility, array(self::VISIBILITY_PRIVATE, self::VISIBILITY_PUBLIC, self::VISIBILITY_SHARED, self::VISIBILITY_FRIENDS))) {
            throw new \InvalidArgumentException("Invalid visibility");
        }
        $this->visibility = $visibility;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeImmutable $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }
}
