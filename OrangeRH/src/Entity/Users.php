<?php

namespace App\Entity;

use App\Repository\UsersRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=UsersRepository::class)
 */
class Users
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=80)
     * @Assert\Length(min=15, max= 80)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=80)
     * @Assert\Length(min=5, max= 80)
     */
    private $userName;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min=8, minMessage = "Votre mot de passe doit faire minimum 8 caracteres")
     * @Assert\EqualTo(propertyPath = "confirm_password", message = "Vous n'avez pas taper le meme mot de passe")
    */

    private $password;

    /**
     * @Assert\EqualTo(propertyPath = "password", message = "Vous n'avez pas taper le meme mot de passe")
     * 
    */
    public $confirm_password;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getUserName(): ?string
    {
        return $this->userName;
    }

    public function setUserName(string $userName): self
    {
        $this->userName = $userName;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }
}
