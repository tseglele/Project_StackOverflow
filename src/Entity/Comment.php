<?php

namespace App\Entity;

use Symfony\Component\Serializer\Annotation\Groups;
use App\Repository\CommentRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;

#[ORM\Entity(repositoryClass: CommentRepository::class)]
#[ApiResource]
class Comment
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(['comment_read'])]
    private ?string $comment = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    #[Groups(['comment_read'])]
    private ?\DateTimeInterface $publication_date = null;

    #[ORM\ManyToOne]
    #[Groups(['comment_read'])]
    private ?Answer $answer_subject_id = null;

    #[ORM\ManyToOne]
    private ?Question $question_subject_id = null;

    #[ORM\ManyToOne]
    #[Groups(['comment_read'])]
    private ?Member $author_id = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(?string $comment): static
    {
        $this->comment = $comment;

        return $this;
    }

    public function getPublicationDate(): ?\DateTimeInterface
    {
        return $this->publication_date;
    }

    public function setPublicationDate(\DateTimeInterface $publication_date): static
    {
        $this->publication_date = $publication_date;

        return $this;
    }

    public function getAnswerSubjectId(): ?Answer
    {
        return $this->answer_subject_id;
    }

    public function setAnswerSubjectId(?Answer $answer_subject_id): static
    {
        $this->answer_subject_id = $answer_subject_id;

        return $this;
    }

    public function getQuestionSubjectId(): ?Question
    {
        return $this->question_subject_id;
    }

    public function setQuestionSubjectId(?Question $question_subject_id): static
    {
        $this->question_subject_id = $question_subject_id;

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
