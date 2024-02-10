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

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Candidats $elu = null;


    #[ORM\OneToMany(targetEntity: Electeurs::class, mappedBy: 'election')]
    private Collection $electeurs;


    #[ORM\ManyToOne(inversedBy: 'elections')]
    private ?NiveauElection $niveau = null;

    #[ORM\ManyToOne(inversedBy: 'elections')]
    private ?Motif $motif = null;

    #[ORM\ManyToOne(inversedBy: 'elections')]
    private ?Region $Region = null;

    #[ORM\ManyToOne(inversedBy: 'elections')]
    private ?District $District = null;

    #[ORM\ManyToOne(inversedBy: 'elections')]
    private ?Commune $Commune = null;

    #[ORM\ManyToOne(inversedBy: 'elections')]
    private ?Fokotany $Fokotany = null;

    #[ORM\Column(nullable: true)]
    private ?int $electeur = null;

    #[ORM\Column(nullable: true)]
    private ?int $candidats = null;

    #[ORM\Column(nullable: true)]
    private ?int $participation = null;

    #[ORM\Column(nullable: true)]
    private ?int $pourcentage = null;

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

    public function getElu(): ?Candidats
    {
        return $this->elu;
    }

    public function setElu(?Candidats $elu): static
    {
        $this->elu = $elu;

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

    public function getNiveau(): ?NiveauElection
    {
        return $this->niveau;
    }

    public function setNiveau(?NiveauElection $niveau): static
    {
        $this->niveau = $niveau;

        return $this;
    }

    public function getMotif(): ?Motif
    {
        return $this->motif;
    }

    public function setMotif(?Motif $motif): static
    {
        $this->motif = $motif;

        return $this;
    }

    public function getRegion(): ?Region
    {
        return $this->Region;
    }

    public function setRegion(?Region $Region): static
    {
        $this->Region = $Region;

        return $this;
    }

    public function getDistrict(): ?District
    {
        return $this->District;
    }

    public function setDistrict(?District $District): static
    {
        $this->District = $District;

        return $this;
    }

    public function getCommune(): ?Commune
    {
        return $this->Commune;
    }

    public function setCommune(?Commune $Commune): static
    {
        $this->Commune = $Commune;

        return $this;
    }

    public function getFokotany(): ?Fokotany
    {
        return $this->Fokotany;
    }

    public function setFokotany(?Fokotany $Fokotany): static
    {
        $this->Fokotany = $Fokotany;

        return $this;
    }

    public function getElecteur(): ?int
    {
        return $this->electeur;
    }

    public function setElecteur(?int $electeur): static
    {
        $this->electeur = $electeur;

        return $this;
    }

    public function getCandidats(): ?int
    {
        return $this->candidats;
    }

    public function setCandidats(?int $candidats): static
    {
        $this->candidats = $candidats;

        return $this;
    }

    public function getParticipation(): ?int
    {
        return $this->participation;
    }

    public function setParticipation(?int $participation): static
    {
        $this->participation = $participation;

        return $this;
    }

    public function getPourcentage(): ?int
    {
        return $this->pourcentage;
    }

    public function setPourcentage(?int $pourcentage): static
    {
        $this->pourcentage = $pourcentage;

        return $this;
    }

}
