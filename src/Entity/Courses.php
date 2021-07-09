<?php

namespace App\Entity;

use App\Repository\CoursesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CoursesRepository::class)
 */
class Courses
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private ?int $id=null;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private ?string $name;

    /**
     * @ORM\Column(type="datetime")
     */
    private $courseAt;

    /**
     * @ORM\Column(type="datetime")
     */
    private $finishedAt;

    /**
     * @ORM\ManyToOne(targetEntity=Former::class, inversedBy="courses")
     */
    private $former;

    /**
     * @ORM\ManyToOne(targetEntity=Classe::class, inversedBy="courses")
     */
    private ?Classe $classe;

    /**
     * @ORM\ManyToOne(targetEntity=Matiere::class, inversedBy="courses")
     */
    private $matiere;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getCourseAt()
    {
        return $this->courseAt;
    }

    public function setCourseAt($courseAt): self
    {
        $this->courseAt = $courseAt;

        return $this;
    }

    public function getFinishedAt()
    {
        return $this->finishedAt;
    }

    public function setFinishedAt($finishedAt): self
    {
        $this->finishedAt = $finishedAt;

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

    public function getClasse(): ?Classe
    {
        return $this->classe;
    }

    public function setClasse(?Classe $classe): self
    {
        $this->classe = $classe;

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
}
