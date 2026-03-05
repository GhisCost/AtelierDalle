<?php

namespace App\Entity;

use App\Repository\TexteAteliersRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TexteAteliersRepository::class)]
class TexteAteliers
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'texteAteliers')]
    #[ORM\JoinColumn(nullable: false)]
    private ?AteliersPlantes $Atelier = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $contenu = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAtelier(): ?AteliersPlantes
    {
        return $this->Atelier;
    }

    public function setAtelier(?AteliersPlantes $Atelier): static
    {
        $this->Atelier = $Atelier;

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
}
