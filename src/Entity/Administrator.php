<?php

namespace App\Entity;

use App\Repository\AdministratorRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AdministratorRepository::class)]
class Administrator
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToMany(targetEntity: Tag::class, inversedBy: 'administrators')]
    private Collection $administrator_id;

    #[ORM\OneToMany(targetEntity: User::class, mappedBy: 'admin_id')]
    private Collection $users;

    public function __construct()
    {
        $this->administrator_id = new ArrayCollection();
        $this->users = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, Tag>
     */
    public function getAdministratorId(): Collection
    {
        return $this->administrator_id;
    }

    public function addAdministratorId(Tag $administratorId): static
    {
        if (!$this->administrator_id->contains($administratorId)) {
            $this->administrator_id->add($administratorId);
        }

        return $this;
    }

    public function removeAdministratorId(Tag $administratorId): static
    {
        $this->administrator_id->removeElement($administratorId);

        return $this;
    }

    /**
     * @return Collection<int, User>
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): static
    {
        if (!$this->users->contains($user)) {
            $this->users->add($user);
            $user->setAdminId($this);
        }

        return $this;
    }

    public function removeUser(User $user): static
    {
        if ($this->users->removeElement($user)) {
            // set the owning side to null (unless already changed)
            if ($user->getAdminId() === $this) {
                $user->setAdminId(null);
            }
        }

        return $this;
    }
}
