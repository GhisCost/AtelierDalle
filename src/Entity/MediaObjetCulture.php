<?php

namespace App\Entity;

use App\Repository\MediaObjetCultureRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MediaObjetCultureRepository::class)]
class MediaObjetCulture
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'mediaObjetCultures')]
    #[ORM\JoinColumn(nullable: false)]
    private ?ObjetCulture $Id_ObjetCulture = null;

    #[ORM\Column(length: 255)]
    private ?string $lienSource = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdObjetCulture(): ?ObjetCulture
    {
        return $this->Id_ObjetCulture;
    }

    public function setIdObjetCulture(?ObjetCulture $Id_ObjetCulture): static
    {
        $this->Id_ObjetCulture = $Id_ObjetCulture;

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
