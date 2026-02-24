<?php

namespace App\Entity;

use App\Repository\SymboleCultureRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SymboleCultureRepository::class)]
class SymboleCulture
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Nom = null;

    #[ORM\ManyToOne(inversedBy: 'symboleCultures')]
    #[ORM\JoinColumn(nullable: false)]
    private ?CultureDuMonde $Id_Culture = null;

    #[ORM\Column(length: 255)]
    private ?string $image = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(string $Nom): static
    {
        $this->Nom = $Nom;

        return $this;
    }

    public function getIdCulture(): ?CultureDuMonde
    {
        return $this->Id_Culture;
    }

    public function setIdCulture(?CultureDuMonde $Id_Culture): static
    {
        $this->Id_Culture = $Id_Culture;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): static
    {
        $this->image = $image;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }
}
