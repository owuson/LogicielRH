<?php

namespace App\Entity;

use App\Repository\LicenciementRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LicenciementRepository::class)
 */
class Licenciement
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @ORM\Column(type="text")
     */
    private $raison;

    /**
     * @ORM\OneToMany(targetEntity=employes::class, mappedBy="licenciement")
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

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getRaison(): ?string
    {
        return $this->raison;
    }

    public function setRaison(string $raison): self
    {
        $this->raison = $raison;

        return $this;
    }

    /**
     * @return Collection|employes[]
     */
    public function getEmployes(): Collection
    {
        return $this->employes;
    }

    public function addEmploye(employes $employe): self
    {
        if (!$this->employes->contains($employe)) {
            $this->employes[] = $employe;
            $employe->setLicenciement($this);
        }

        return $this;
    }

    public function removeEmploye(employes $employe): self
    {
        if ($this->employes->contains($employe)) {
            $this->employes->removeElement($employe);
            // set the owning side to null (unless already changed)
            if ($employe->getLicenciement() === $this) {
                $employe->setLicenciement(null);
            }
        }

        return $this;
    }
}
