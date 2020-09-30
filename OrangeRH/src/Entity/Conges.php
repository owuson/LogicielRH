<?php

namespace App\Entity;

use App\Repository\CongesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CongesRepository::class)
 */
class Conges
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $jourDemande;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $jourRestant;

    /**
     * @ORM\Column(type="boolean")
     */
    private $statut;

    /**
     * @ORM\Column(type="date")
     */
    private $dateDemande;

    /**
     * @ORM\ManyToMany(targetEntity=Employes::class, inversedBy="conges")
     */
    private $employes;

    public function __construct()
    {
        $this->employes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getJourDemande(): ?int
    {
        return $this->jourDemande;
    }

    public function setJourDemande(int $jourDemande): self
    {
        $this->jourDemande = $jourDemande;

        return $this;
    }

    public function getJourRestant(): ?int
    {
        return $this->jourRestant;
    }

    public function setJourRestant(?int $jourRestant): self
    {
        $this->jourRestant = $jourRestant;

        return $this;
    }

    public function getStatut(): ?bool
    {
        return $this->statut;
    }

    public function setStatut(bool $statut): self
    {
        $this->statut = $statut;

        return $this;
    }

    public function getDateDemande(): ?\DateTimeInterface
    {
        return $this->dateDemande;
    }

    public function setDateDemande(\DateTimeInterface $dateDemande): self
    {
        $this->dateDemande = $dateDemande;

        return $this;
    }

    /**
     * @return Collection|Employes[]
     */
    public function getEmployes(): Collection
    {
        return $this->employes;
    }

    public function addEmploye(Employes $employe): self
    {
        if (!$this->employes->contains($employe)) {
            $this->employes[] = $employe;
        }

        return $this;
    }

    public function removeEmploye(Employes $employe): self
    {
        if ($this->employes->contains($employe)) {
            $this->employes->removeElement($employe);
        }

        return $this;
    }
}
