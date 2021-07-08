<?php

namespace App\Entity;

use App\Repository\StudentRepository;
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

    public function getCodeMassar(): ?string
    {
        return $this->codeMassar;
    }

    public function setCodeMassar(string $codeMassar): self
    {
        $this->codeMassar = $codeMassar;

        return $this;
    }
}
