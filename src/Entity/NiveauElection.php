<?php

namespace App\Entity;

use App\Repository\NiveauElectionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NiveauElectionRepository::class)]
class NiveauElection
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $niveau = null;

    #[ORM\OneToMany(targetEntity: Elections::class, mappedBy: 'niveau')]
    private Collection $elections;

    public function __construct()
    {
        $this->elections = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNiveau(): ?string
    {
        return $this->niveau;
    }

    public function setNiveau(string $niveau): static
    {
        $this->niveau = $niveau;

        return $this;
    }

    /**
     * @return Collection<int, Elections>
     */
    public function getElections(): Collection
    {
        return $this->elections;
    }

    public function addElection(Elections $election): static
    {
        if (!$this->elections->contains($election)) {
            $this->elections->add($election);
            $election->setNiveau($this);
        }

        return $this;
    }

    public function removeElection(Elections $election): static
    {
        if ($this->elections->removeElement($election)) {
            // set the owning side to null (unless already changed)
            if ($election->getNiveau() === $this) {
                $election->setNiveau(null);
            }
        }

        return $this;
    }
    public function __toString()
    {
        return $this->niveau;
    }
}
