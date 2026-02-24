<?php

namespace App\Entity;

use App\Repository\MediaBruitChantierRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MediaBruitChantierRepository::class)]
class MediaBruitChantier
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'mediaBruitChantiers')]
    #[ORM\JoinColumn(nullable: false)]
    private ?BruitChantier $Id_BruitChantier = null;

    #[ORM\Column(length: 255)]
    private ?string $lienSource = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdBruitChantier(): ?BruitChantier
    {
        return $this->Id_BruitChantier;
    }

    public function setIdBruitChantier(?BruitChantier $Id_BruitChantier): static
    {
        $this->Id_BruitChantier = $Id_BruitChantier;

        return $this;
    }

    public function getLienSource(): ?string
    {
        return $this->lienSource;
    }

    public function setLienSource(string $lienSource): static
    {
        $this->lienSource = $lienSource;

        return $this;
    }
}
