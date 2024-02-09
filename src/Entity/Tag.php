<?php

namespace App\Entity;

use Symfony\Component\Serializer\Annotation\Groups;
use App\Repository\TagRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;

#[ORM\Entity(repositoryClass: TagRepository::class)]
#[ApiResource]
class Tag
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups(['tag_read'])]
    private ?string $description = null;

    #[ORM\ManyToMany(targetEntity: Question::class, inversedBy: 'tags')]
    private Collection $tag_id;

    #[ORM\ManyToMany(targetEntity: Administrator::class, mappedBy: 'administrator_id')]
    private Collection $administrators;

    public function __construct()
    {
        $this->tag_id = new ArrayCollection();
        $this->administrators = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection<int, Question>
     */
    public function getTagId(): Collection
    {
        return $this->tag_id;
    }

    public function addTagId(Question $tagId): static
    {
        if (!$this->tag_id->contains($tagId)) {
            $this->tag_id->add($tagId);
        }

        return $this;
    }

    public function removeTagId(Question $tagId): static
    {
        $this->tag_id->removeElement($tagId);

        return $this;
    }

    /**
     * @return Collection<int, Administrator>
     */
    public function getAdministrators(): Collection
    {
        return $this->administrators;
    }

    public function addAdministrator(Administrator $administrator): static
    {
        if (!$this->administrators->contains($administrator)) {
            $this->administrators->add($administrator);
            $administrator->addAdministratorId($this);
        }

        return $this;
    }

    public function removeAdministrator(Administrator $administrator): static
    {
        if ($this->administrators->removeElement($administrator)) {
            $administrator->removeAdministratorId($this);
        }

        return $this;
    }
}
