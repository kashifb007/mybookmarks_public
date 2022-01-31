<?php

namespace App\Entity;

use App\Repository\LinkRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LinkRepository::class)
 */
class Link
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="bigint")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $metaDescription;

    /**
     * @ORM\Column(type="string", length=3072)
     */
    private $url;

    /**
     * @ORM\Column(type="string", length=128, nullable=true)
     */
    private $image;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $ogTitle;

    /**
     * @ORM\Column(type="string", length=512, nullable=true)
     */
    private $ogDescription;

    /**
     * @ORM\Column(type="string", length=128, nullable=true)
     */
    private $ogImage;

    /**
     * @ORM\Column(type="string", length=3072, nullable=true)
     */
    private $ogUrl;

    /**
     * @ORM\Column(type="string", length=128, nullable=true)
     */
    private $ogType;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private $updatedAt;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isSite;

    /**
     * @ORM\OneToMany(targetEntity=Bookmark::class, mappedBy="link")
     */
    private $bookmarks;

    /**
     * @ORM\ManyToOne(targetEntity=LinkStatus::class, inversedBy="links")
     * @ORM\JoinColumn(nullable=false)
     */
    private $status;

    public function __construct()
    {
        $this->bookmarks = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getMetaDescription(): ?string
    {
        return $this->metaDescription;
    }

    public function setMetaDescription(?string $metaDescription): self
    {
        $this->metaDescription = $metaDescription;

        return $this;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getOgTitle(): ?string
    {
        return $this->ogTitle;
    }

    public function setOgTitle(?string $ogTitle): self
    {
        $this->ogTitle = $ogTitle;

        return $this;
    }

    public function getOgDescription(): ?string
    {
        return $this->ogDescription;
    }

    public function setOgDescription(?string $ogDescription): self
    {
        $this->ogDescription = $ogDescription;

        return $this;
    }

    public function getOgImage(): ?string
    {
        return $this->ogImage;
    }

    public function setOgImage(?string $ogImage): self
    {
        $this->ogImage = $ogImage;

        return $this;
    }

    public function getOgUrl(): ?string
    {
        return $this->ogUrl;
    }

    public function setOgUrl(?string $ogUrl): self
    {
        $this->ogUrl = $ogUrl;

        return $this;
    }

    public function getOgType(): ?string
    {
        return $this->ogType;
    }

    public function setOgType(?string $ogType): self
    {
        $this->ogType = $ogType;

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

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getIsSite(): ?bool
    {
        return $this->isSite;
    }

    public function setIsSite(bool $isSite): self
    {
        $this->isSite = $isSite;

        return $this;
    }

    /**
     * @return Collection|Bookmark[]
     */
    public function getBookmarks(): Collection
    {
        return $this->bookmarks;
    }

    public function addBookmark(Bookmark $bookmark): self
    {
        if (!$this->bookmarks->contains($bookmark)) {
            $this->bookmarks[] = $bookmark;
            $bookmark->setLink($this);
        }

        return $this;
    }

    public function removeBookmark(Bookmark $bookmark): self
    {
        if ($this->bookmarks->removeElement($bookmark)) {
            // set the owning side to null (unless already changed)
            if ($bookmark->getLink() === $this) {
                $bookmark->setLink(null);
            }
        }

        return $this;
    }

    public function getStatus(): ?LinkStatus
    {
        return $this->status;
    }

    public function setStatus(?LinkStatus $status): self
    {
        $this->status = $status;

        return $this;
    }
}
