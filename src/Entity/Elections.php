<?php

namespace App\Entity;

use App\Repository\ElectionsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ElectionsRepository::class)]
class Elections
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $debut = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $fin = null;

    #[ORM\Column]
    private ?int $candidat = null;

    #[ORM\Column]
    private ?int $electeur = null;

    #[ORM\Column]
    private ?float $participation = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Candidats $elu = null;

    #[ORM\Column]
    private ?float $pourcentage = null;

    #[ORM\OneToMany(targetEntity: Electeurs::class, mappedBy: 'election')]
    private Collection $electeurs;

    public function __construct()
    {
        $this->electeurs = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): static
    {
        $this->date = $date;

        return $this;
    }

    public function getDebut(): ?\DateTimeInterface
    {
        return $this->debut;
    }

    public function setDebut(\DateTimeInterface $debut): static
    {
        $this->debut = $debut;

        return $this;
    }

    public function getFin(): ?\DateTimeInterface
    {
        return $this->fin;
    }

    public function setFin(\DateTimeInterface $fin): static
    {
        $this->fin = $fin;

        return $this;
    }

    public function getCandidat(): ?int
    {
        return $this->candidat;
    }

    public function setCandidat(int $candidat): static
    {
        $this->candidat = $candidat;

        return $this;
    }

    public function getElecteur(): ?int
    {
        return $this->electeur;
    }

    public function setElecteur(int $electeur): static
    {
        $this->electeur = $electeur;

        return $this;
    }

    public function getParticipation(): ?float
    {
        return $this->participation;
    }

    public function setParticipation(float $participation): static
    {
        $this->participation = $participation;

        return $this;
    }

    public function getElu(): ?Candidats
    {
        return $this->elu;
    }

    public function setElu(?Candidats $elu): static
    {
        $this->elu = $elu;

        return $this;
    }

    public function getPourcentage(): ?float
    {
        return $this->pourcentage;
    }

    public function setPourcentage(float $pourcentage): static
    {
        $this->pourcentage = $pourcentage;

        return $this;
    }

    /**
     * @return Collection<int, Electeurs>
     */
    public function getElecteurs(): Collection
    {
        return $this->electeurs;
    }

    public function addElecteur(Electeurs $electeur): static
    {
        if (!$this->electeurs->contains($electeur)) {
            $this->electeurs->add($electeur);
            $electeur->setElection($this);
        }

        return $this;
    }

    public function removeElecteur(Electeurs $electeur): static
    {
        if ($this->electeurs->removeElement($electeur)) {
            // set the owning side to null (unless already changed)
            if ($electeur->getElection() === $this) {
                $electeur->setElection(null);
            }
        }

        return $this;
    }

}
