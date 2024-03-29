<?php

namespace App\Entity;

use App\Repository\FormerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FormerRepository::class)
 */
class Former extends User
{

    /**
     * @ORM\Column(type="string", length=255)
     */
    private ?string $matricule;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private ?string $typeContrat;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private ?string $grade;

    /**
     * @ORM\OneToMany(targetEntity=Courses::class, mappedBy="former")
     */
    private $courses;

    /**
     * @ORM\OneToMany(targetEntity=Evaluation::class, mappedBy="former")
     */
    private $evaluation;

    public function __construct()
    {
        parent::__construct();
        $this->courses = new ArrayCollection();
        $this->evaluation = new ArrayCollection();
    }


    public function getMatricule(): ?string
    {
        return $this->matricule;
    }

    public function setMatricule(string $matricule): self
    {
        $this->matricule = $matricule;

        return $this;
    }

    public function getTypeContrat(): ?string
    {
        return $this->typeContrat;
    }

    public function setTypeContrat(string $typeContrat): self
    {
        $this->typeContrat = $typeContrat;

        return $this;
    }

    public function getGrade(): ?string
    {
        return $this->grade;
    }

    public function setGrade(string $grade): self
    {
        $this->grade = $grade;

        return $this;
    }

    /**
     * @return Collection|Courses[]
     */
    public function getCourses(): Collection
    {
        return $this->courses;
    }

    public function addCourse(Courses $course): self
    {
        if (!$this->courses->contains($course)) {
            $this->courses[] = $course;
            $course->setFormer($this);
        }

        return $this;
    }

    public function removeCourse(Courses $course): self
    {
        if ($this->courses->removeElement($course)) {
            // set the owning side to null (unless already changed)
            if ($course->getFormer() === $this) {
                $course->setFormer(null);
            }
        }

        return $this;
    }

//    public function __toString()
//    {
//        return $this->getFirstName()." ".$this->getLastName();
//            //parent::__toString(); // TODO: Change the autogenerated stub
//    }

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
        $evaluation->setFormer($this);
    }

    return $this;
}

public function removeEvaluation(Evaluation $evaluation): self
{
    if ($this->evaluation->removeElement($evaluation)) {
        // set the owning side to null (unless already changed)
        if ($evaluation->getFormer() === $this) {
            $evaluation->setFormer(null);
        }
    }

    return $this;
}
}
