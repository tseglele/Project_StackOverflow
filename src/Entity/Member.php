<?php

namespace App\Entity;

use App\Repository\MemberRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MemberRepository::class)]
#[ORM\Table(name: '`member`')]
class Member
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $registration_date = null;

    #[ORM\Column(length: 255)]
    private ?string $biography = null;

    #[ORM\Column(nullable: true)]
    private ?int $reputation = null;

    #[ORM\Column(length: 255)]
    private ?string $country = null;

    #[ORM\Column(nullable: true)]
    private ?int $valideted = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRegistrationDate(): ?\DateTimeInterface
    {
        return $this->registration_date;
    }

    public function setRegistrationDate(\DateTimeInterface $registration_date): static
    {
        $this->registration_date = $registration_date;

        return $this;
    }

    public function getBiography(): ?string
    {
        return $this->biography;
    }

    public function setBiography(string $biography): static
    {
        $this->biography = $biography;

        return $this;
    }

    public function getReputation(): ?int
    {
        return $this->reputation;
    }

    public function setReputation(?int $reputation): static
    {
        $this->reputation = $reputation;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(string $country): static
    {
        $this->country = $country;

        return $this;
    }

    public function getValideted(): ?int
    {
        return $this->valideted;
    }

    public function setValideted(?int $valideted): static
    {
        $this->valideted = $valideted;

        return $this;
    }
}
