<?php

namespace App\Entity;

use App\Repository\TesteCrudRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TesteCrudRepository::class)]
class TesteCrud
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom_teste = null;

    #[ORM\Column(length: 255)]
    private ?string $prenom_teste = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomTeste(): ?string
    {
        return $this->nom_teste;
    }

    public function setNomTeste(string $nom_teste): static
    {
        $this->nom_teste = $nom_teste;

        return $this;
    }

    public function getPrenomTeste(): ?string
    {
        return $this->prenom_teste;
    }

    public function setPrenomTeste(string $prenom_teste): static
    {
        $this->prenom_teste = $prenom_teste;

        return $this;
    }
}
