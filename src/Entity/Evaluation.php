<?php

namespace App\Entity;

use App\Repository\EvaluationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EvaluationRepository::class)
 */
class Evaluation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private ?int $id=null;

    /**
     * @ORM\Column(type="float")
     */
    private ?float $note;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private ?string $duration;

    /**
     * @ORM\Column(type="datetime")
     */
    private $evaluationAt;

    /**
     * @ORM\ManyToOne(targetEntity=Matiere::class, inversedBy="evaluation")
     */
    private $matiere;

    /**
     * @ORM\ManyToOne(targetEntity=Former::class, inversedBy="evaluation")
     */
    private $former;

    /**
     * @ORM\ManyToOne(targetEntity=Student::class, inversedBy="evaluation")
     */
    private $student;

    /**
     * @ORM\ManyToOne(targetEntity=EvaluationCategory::class, inversedBy="evaluation")
     */
    private $evaluationCategory;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNote(): ?float
    {
        return $this->note;
    }

    public function setNote(float $note): self
    {
        $this->note = $note;

        return $this;
    }

    public function getDuration(): ?string
    {
        return $this->duration;
    }

    public function setDuration(string $duration): self
    {
        $this->duration = $duration;

        return $this;
    }

    public function getEvaluationAt(): ?\DateTimeInterface
    {
        return $this->evaluationAt;
    }

    public function setEvaluationAt(\DateTimeInterface $evaluationAt): self
    {
        $this->evaluationAt = $evaluationAt;

        return $this;
    }

    public function getMatiere(): ?Matiere
    {
        return $this->matiere;
    }

    public function setMatiere(?Matiere $matiere): self
    {
        $this->matiere = $matiere;

        return $this;
    }

    public function getFormer(): ?Former
    {
        return $this->former;
    }

    public function setFormer(?Former $former): self
    {
        $this->former = $former;

        return $this;
    }

    public function getStudent(): ?Student
    {
        return $this->student;
    }

    public function setStudent(?Student $student): self
    {
        $this->student = $student;

        return $this;
    }

    public function getEvaluationCategory(): ?EvaluationCategory
    {
        return $this->evaluationCategory;
    }

    public function setEvaluationCategory(?EvaluationCategory $evaluationCategory): self
    {
        $this->evaluationCategory = $evaluationCategory;

        return $this;
    }
}
