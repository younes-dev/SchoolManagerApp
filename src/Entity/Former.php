<?php

namespace App\Entity;

use App\Repository\FormerRepository;
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
}
