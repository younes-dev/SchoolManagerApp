<?php

namespace App\Entity;

use App\Repository\ClasseRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ClasseRepository::class)
 */
class Classe
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
    private string $name;

    /**
     * @ORM\Column(type="integer")
     */
    private ?int $year;

    /**
     * @ORM\OneToMany(targetEntity=Courses::class, mappedBy="classe")
     */
    private $courses;

    /**
     * @ORM\OneToMany(targetEntity=Student::class, mappedBy="classe")
     */
    private $students;

    public function __construct()
    {
        $this->courses = new ArrayCollection();
        $this->students = new ArrayCollection();
    }

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

    public function getYear(): ?int
    {
        return $this->year;
    }

    public function setYear(int $year): self
    {
        $this->year = $year;

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
            $course->setClasse($this);
        }

        return $this;
    }

    public function removeCourse(Courses $course): self
    {
        if ($this->courses->removeElement($course) && $course->getClasse() === $this) {
            // set the owning side to null (unless already changed)
                $course->setClasse(null);
        }

        return $this;
    }

    /**
     * @return Collection|Student[]
     */
    public function getStudents(): Collection
    {
        return $this->students;
    }

    public function addStudent(Student $student): self
    {
        if (!$this->students->contains($student)) {
            $this->students[] = $student;
            $student->setClasse($this);
        }

        return $this;
    }

    public function removeStudent(Student $student): self
    {
        if ($this->students->removeElement($student) && $student->getClasse() === $this) {
            // set the owning side to null (unless already changed)
                $student->setClasse(null);
        }

        return $this;
    }

    public function __toString()
    {
        return $this->name;
    }
}
