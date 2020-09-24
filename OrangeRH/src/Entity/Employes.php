<?php

namespace App\Entity;

use App\Repository\EmployesRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=EmployesRepository::class)
 */
class Employes
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=80)
     * @Assert\Length(min=2, max= 80)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=80)
     * @Assert\Length(min=3, max= 80)
     */
    private $prenom;

    /**
     * @ORM\Column(type="integer")
     * @Assert\Positive
     */
    private $age;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min=10, max= 255)
     */
    private $adresse;

    /**
     * @ORM\Column(type="date")
     * 
     */
    private $dateArrive;

    /**
     * @ORM\Column(type="integer")
     * @Assert\Positive
     * @Assert\Length(min=1, max= 1, minMessage="Veuillez saisir un chiffre ne depassant pas 9")
     */
    private $echelon;

    /**
     * @ORM\Column(type="string", length=25)
     * @Assert\Length(min=5, max= 25, minMessage="Ceci est beaucoup trop court")
     */
    private $service;

    /**
     * @ORM\Column(type="float")
     * @Assert\Positive
     */
    private $salaire;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $congeRestant;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(int $age): self
    {
        $this->age = $age;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getDateArrive(): ?\DateTimeInterface
    {
        return $this->dateArrive;
    }

    public function setDateArrive(\DateTimeInterface $dateArrive): self
    {
        $this->dateArrive = $dateArrive;

        return $this;
    }

    public function getEchelon(): ?int
    {
        return $this->echelon;
    }

    public function setEchelon(int $echelon): self
    {
        $this->echelon = $echelon;

        return $this;
    }

    public function getService(): ?string
    {
        return $this->service;
    }

    public function setService(string $service): self
    {
        $this->service = $service;

        return $this;
    }

    public function getSalaire(): ?float
    {
        return $this->salaire;
    }

    public function setSalaire(float $salaire): self
    {
        $this->salaire = $salaire;

        return $this;
    }

    public function getCongeRestant(): ?float
    {
        return $this->congeRestant;
    }

    public function setCongeRestant(?float $congeRestant): self
    {
        $this->congeRestant = $congeRestant;

        return $this;
    }
}
