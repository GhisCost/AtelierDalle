<?php

namespace App\Entity;

use App\Repository\TexteGastronomieRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TexteGastronomieRepository::class)]
class TexteGastronomie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'contenu')]
    #[ORM\JoinColumn(nullable: false)]
    private ?GastronomieDalle $gastronomie = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $contenu = null;

    #[ORM\Column(length: 255)]
    private ?string $categorie = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGastronomie(): ?GastronomieDalle
    {
        return $this->gastronomie;
    }

    public function setGastronomie(?GastronomieDalle $gastronomie): static
    {
        $this->gastronomie = $gastronomie;

        return $this;
    }

    public function getContenu(): ?string
    {
        return $this->contenu;
    }

    public function setContenu(string $contenu): static
    {
        $this->contenu = $contenu;

        return $this;
    }

    public function getCategorie(): ?string
    {
        return $this->categorie;
    }

    public function setCategorie(string $categorie): static
    {
        $this->categorie = $categorie;

        return $this;
    }
  
}
