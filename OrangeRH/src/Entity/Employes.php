<?php

namespace App\Entity;

use App\Repository\EmployesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    /**
     * @ORM\ManyToMany(targetEntity=Conges::class, mappedBy="employes")
     */
    private $conges;

    /**
     * @ORM\ManyToMany(targetEntity=Message::class, inversedBy="employes")
     */
    private $messages;

    /**
     * @ORM\ManyToOne(targetEntity=Licenciement::class, inversedBy="employes")
     */
    private $licenciement;

    /**
     * @ORM\OneToMany(targetEntity=FicheDePaie::class, mappedBy="employes")
     */
    private $ficheDepaie;


    /**
     * @ORM\Column(type="string", length=80)
     */
    private $email;

    public function __construct()
    {
        $this->conges = new ArrayCollection();
        $this->messages = new ArrayCollection();
        $this->ficheDepaie = new ArrayCollection();
    }

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

    /**
     * @return Collection|Conges[]
     */
    public function getConges(): Collection
    {
        return $this->conges;
    }

    public function addConge(Conges $conge): self
    {
        if (!$this->conges->contains($conge)) {
            $this->conges[] = $conge;
            $conge->addEmploye($this);
        }

        return $this;
    }

    public function removeConge(Conges $conge): self
    {
        if ($this->conges->contains($conge)) {
            $this->conges->removeElement($conge);
            $conge->removeEmploye($this);
        }

        return $this;
    }

    /**
     * @return Collection|Message[]
     */
    public function getMessages(): Collection
    {
        return $this->messages;
    }

    public function addMessage(Message $message): self
    {
        if (!$this->messages->contains($message)) {
            $this->messages[] = $message;
        }

        return $this;
    }

    public function removeMessage(Message $message): self
    {
        if ($this->messages->contains($message)) {
            $this->messages->removeElement($message);
        }

        return $this;
    }

    public function getLicenciement(): ?Licenciement
    {
        return $this->licenciement;
    }

    public function setLicenciement(?Licenciement $licenciement): self
    {
        $this->licenciement = $licenciement;

        return $this;
    }

    /**
     * @return Collection|FicheDePaie[]
     */
    public function getFicheDepaie(): Collection
    {
        return $this->ficheDepaie;
    }

    public function addFicheDepaie(FicheDePaie $ficheDepaie): self
    {
        if (!$this->ficheDepaie->contains($ficheDepaie)) {
            $this->ficheDepaie[] = $ficheDepaie;
            $ficheDepaie->setEmployes($this);
        }

        return $this;
    }

    public function removeFicheDepaie(FicheDePaie $ficheDepaie): self
    {
        if ($this->ficheDepaie->contains($ficheDepaie)) {
            $this->ficheDepaie->removeElement($ficheDepaie);
            // set the owning side to null (unless already changed)
            if ($ficheDepaie->getEmployes() === $this) {
                $ficheDepaie->setEmployes(null);
            }
        }

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
}
