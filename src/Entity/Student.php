<?php

namespace App\Entity;

use App\Repository\StudentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=StudentRepository::class)
 */
class Student extends User
{

    /**
     * @ORM\Column(type="string", length=255)
     */
    private ?string $codeMassar;

    /**
     * @ORM\OneToMany(targetEntity=Evaluation::class, mappedBy="student")
     */
    private $evaluation;

    /**
     * @ORM\ManyToOne(targetEntity=Classe::class, inversedBy="students")
     */
    private $classe;

    public function __construct()
    {
        parent::__construct();
        $this->evaluation = new ArrayCollection();
    }

    public function getCodeMassar(): ?string
    {
        return $this->codeMassar;
    }

    public function setCodeMassar(string $codeMassar): self
    {
        $this->codeMassar = $codeMassar;

        return $this;
    }

    /**
     * @return Collection|Evaluation[]
     */
    public function getEvaluation(): Collection
    {
        return $this->evaluation;
    }

    public function addEvaluation(Evaluation $evaluation): self
    {
        if (!$this->evaluation->contains($evaluation)) {
            $this->evaluation[] = $evaluation;
            $evaluation->setStudent($this);
        }

        return $this;
    }

    public function removeEvaluation(Evaluation $evaluation): self
    {
        if ($this->evaluation->removeElement($evaluation)) {
            // set the owning side to null (unless already changed)
            if ($evaluation->getStudent() === $this) {
                $evaluation->setStudent(null);
            }
        }

        return $this;
    }

    public function getClasse(): ?Classe
    {
        return $this->classe;
    }

    public function setClasse(?Classe $classe): self
    {
        $this->classe = $classe;

        return $this;
    }
}
