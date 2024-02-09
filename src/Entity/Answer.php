<?php

namespace App\Entity;

use Symfony\Component\Serializer\Annotation\Groups;
use App\Repository\AnswerRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;

#[ORM\Entity(repositoryClass: AnswerRepository::class)]
#[ApiResource]
class Answer
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(['answer_read'])]
    private ?string $answer = null;

    #[ORM\Column(nullable: true)]
    #[Groups(['answer_read'])]
    private ?int $score = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $publication_date = null;

    #[ORM\ManyToOne(inversedBy: 'answers')]
    private ?Question $question_id = null;

    #[ORM\Column(nullable: true)]
    #[Groups(['answer_read'])]
    private ?int $prefered = null;

    #[ORM\ManyToOne]
    #[Groups(['answer_read'])]
    private ?Member $author_id = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAnswer(): ?string
    {
        return $this->answer;
    }

    public function setAnswer(?string $answer): static
    {
        $this->answer = $answer;

        return $this;
    }

    public function getScore(): ?int
    {
        return $this->score;
    }

    public function setScore(?int $score): static
    {
        $this->score = $score;

        return $this;
    }

    public function getPublicationDate(): ?\DateTimeInterface
    {
        return $this->publication_date;
    }

    public function setPublicationDate(?\DateTimeInterface $publication_date): static
    {
        $this->publication_date = $publication_date;

        return $this;
    }

    public function getQuestionId(): ?Question
    {
        return $this->question_id;
    }

    public function setQuestionId(?Question $question_id): static
    {
        $this->question_id = $question_id;

        return $this;
    }

    public function getPrefered(): ?int
    {
        return $this->prefered;
    }

    public function setPrefered(?int $prefered): static
    {
        $this->prefered = $prefered;

        return $this;
    }

    public function getAuthorId(): ?Member
    {
        return $this->author_id;
    }

    public function setAuthorId(?Member $author_id): static
    {
        $this->author_id = $author_id;

        return $this;
    }
}
