<?php

namespace App\Entity;

use App\Repository\CandidatsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CandidatsRepository::class)]
class Candidats
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Electeurs $identifiant = null;

    #[ORM\Column(length: 255)]
    private ?string $motif = null;

    #[ORM\Column(length: 255)]
    private ?string $photo = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Elections $election = null;

    #[ORM\Column]
    private ?float $pourcentage = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdentifiant(): ?Electeurs
    {
        return $this->identifiant;
    }

    public function setIdentifiant(?Electeurs $identifiant): static
    {
        $this->identifiant = $identifiant;

        return $this;
    }

    public function getMotif(): ?string
    {
        return $this->motif;
    }

    public function setMotif(string $motif): static
    {
        $this->motif = $motif;

        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(string $photo): static
    {
        $this->photo = $photo;

        return $this;
    }

    public function getElection(): ?Elections
    {
        return $this->election;
    }

    public function setElection(?Elections $election): static
    {
        $this->election = $election;

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

}
