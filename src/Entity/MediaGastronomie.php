<?php

namespace App\Entity;

use App\Repository\MediaGastronomieRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MediaGastronomieRepository::class)]
class MediaGastronomie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'mediaGastronomies')]
    #[ORM\JoinColumn(nullable: false)]
    private ?GastronomieDalle $Id_Gastronomie = null;

    #[ORM\Column(length: 255)]
    private ?string $lien_source = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdGastronomie(): ?GastronomieDalle
    {
        return $this->Id_Gastronomie;
    }

    public function setIdGastronomie(?GastronomieDalle $Id_Gastronomie): static
    {
        $this->Id_Gastronomie = $Id_Gastronomie;

        return $this;
    }

    public function getLienSource(): ?string
    {
        return $this->lien_source;
    }

    public function setLienSource(string $lien_source): static
    {
        $this->lien_source = $lien_source;

        return $this;
    }
}
