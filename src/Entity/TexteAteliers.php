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
    private ?AteliersPlantes $id_Atelier = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $contenu = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdAtelier(): ?AteliersPlantes
    {
        return $this->id_Atelier;
    }

    public function setIdAtelier(?AteliersPlantes $id_Atelier): static
    {
        $this->id_Atelier = $id_Atelier;

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
