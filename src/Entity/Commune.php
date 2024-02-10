<?php

namespace App\Entity;

use App\Repository\CommuneRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CommuneRepository::class)]
class Commune
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 10)]
    private ?string $code = null;

    #[ORM\ManyToOne(inversedBy: 'communes')]
    private ?District $district = null;

    #[ORM\OneToMany(targetEntity: Fokotany::class, mappedBy: 'commune')]
    private Collection $fokotanies;

    #[ORM\OneToMany(targetEntity: Elections::class, mappedBy: 'Commune')]
    private Collection $elections;

    public function __construct()
    {
        $this->fokotanies = new ArrayCollection();
        $this->elections = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): static
    {
        $this->code = $code;

        return $this;
    }

    public function getDistrict(): ?District
    {
        return $this->district;
    }

    public function setDistrict(?District $district): static
    {
        $this->district = $district;

        return $this;
    }

    /**
     * @return Collection<int, Fokotany>
     */
    public function getFokotanies(): Collection
    {
        return $this->fokotanies;
    }

    public function addFokotany(Fokotany $fokotany): static
    {
        if (!$this->fokotanies->contains($fokotany)) {
            $this->fokotanies->add($fokotany);
            $fokotany->setCommune($this);
        }

        return $this;
    }

    public function removeFokotany(Fokotany $fokotany): static
    {
        if ($this->fokotanies->removeElement($fokotany)) {
            // set the owning side to null (unless already changed)
            if ($fokotany->getCommune() === $this) {
                $fokotany->setCommune(null);
            }
        }

        return $this;
    }
    public function __toString()
    {
        return $this->nom;
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
            $election->setCommune($this);
        }

        return $this;
    }

    public function removeElection(Elections $election): static
    {
        if ($this->elections->removeElement($election)) {
            // set the owning side to null (unless already changed)
            if ($election->getCommune() === $this) {
                $election->setCommune(null);
            }
        }

        return $this;
    }

}
