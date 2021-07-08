<?php

namespace App\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\DiscriminatorColumn;
use Doctrine\ORM\Mapping\DiscriminatorMap;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\InheritanceType;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @Entity
 * @InheritanceType("JOINED")
 * @DiscriminatorColumn(name="discr", type="string")
 * @DiscriminatorMap({"user" = "User", "student" = "Student", "former" = "Former"})
 * @ORM\HasLifecycleCallbacks()
 * @UniqueEntity("email")
 * @UniqueEntity("username")
 */
class User implements UserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private ?int $id=null;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Vous devez indiquer votre prénom")
     */
    private string $firstName;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Vous devez indiquer votre nom")
     */
    private string $lastName;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Vous devez indiquer votre nom d'utilisateur")
     */
    private string $username;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Vous devez indiquer votre email")
     * @Assert\Email(message="votre format d'email incorrect", groups={"register","defaults"})
     */
    private string $email;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Vous devez indiquer votre password")
     */
    private string $password;

    /**
     * @Assert\NotBlank(message="Vous devez indiquer votre password")
     * @Assert\EqualTo(propertyPath="password", message="La confirmation du mot de passe ne correspond pas", groups="register")
     */
    public string $retypePassword;

    /**
     * @ORM\Column(type="datetime")
     * @Assert\Type("datetime")
     */
    private DateTime $createdAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @Assert\Type("datetime")
     */
    private ?DateTime $updatedAt;

    /**
     * @ORM\Column(type="json")
     */
    private array $roles = [];

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $address;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $phone;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $cne;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $city;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }

    /**
     * @ORM\PrePersist
     */
    public function setCreatedAt():void
    {
        $this->createdAt = new DateTime();
    }

    public function getUpdatedAt():? DateTime
    {
        return $this->updatedAt;
    }

    /**
     * @ORM\PreUpdate
     */
    public function setUpdatedAt(): void
    {
        $this->updatedAt = new DateTime();
    }

    public function getRoles(): array
    {
        return $this->roles;
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }
    
    public function getUserIdentifier(): ?string
    {
        return null;
    }

    public function getSalt(): ?string
    {
        return null;
    }

    public function eraseCredentials(): int
    {
        return 0;
    }

    public function __construct()
    {
        $this->setRoles(['ROLE_USER']);
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(?string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function __toString()
    {
        return $this->firstName .' '. $this->lastName;
    }

    public function getCne(): ?string
    {
        return $this->cne;
    }

    public function setCne(string $cne): self
    {
        $this->cne = $cne;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }


}