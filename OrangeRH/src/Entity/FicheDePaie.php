<?php

namespace App\Entity;

use App\Repository\FicheDePaieRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FicheDePaieRepository::class)
 */
class FicheDePaie
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float")
     */
    private $salaire;

    /**
     * @ORM\Column(type="integer")
     */
    private $heureTravaille;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $congesRestant;

    /**
     * @ORM\Column(type="float")
     */
    private $salaireBrut;

    /**
     * @ORM\Column(type="date")
     */
    private $dateArrive;

    /**
     * @ORM\Column(type="float")
     */
    private $salaireHoraire;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getHeureTravaille(): ?int
    {
        return $this->heureTravaille;
    }

    public function setHeureTravaille(int $heureTravaille): self
    {
        $this->heureTravaille = $heureTravaille;

        return $this;
    }

    public function getCongesRestant(): ?float
    {
        return $this->congesRestant;
    }

    public function setCongesRestant(?float $congesRestant): self
    {
        $this->congesRestant = $congesRestant;

        return $this;
    }

    public function getSalaireBrut(): ?float
    {
        return $this->salaireBrut;
    }

    public function setSalaireBrut(float $salaireBrut): self
    {
        $this->salaireBrut = $salaireBrut;

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

    public function getSalaireHoraire(): ?float
    {
        return $this->salaireHoraire;
    }

    public function setSalaireHoraire(float $salaireHoraire): self
    {
        $this->salaireHoraire = $salaireHoraire;

        return $this;
    }
}
