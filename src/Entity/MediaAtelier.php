<?php

namespace App\Entity;

use App\Repository\MediaAtelierRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MediaAtelierRepository::class)]
class MediaAtelier
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'mediaAteliers')]
    #[ORM\JoinColumn(nullable: false)]
    private ?AteliersPlantes $Id_Atelier = null;

    #[ORM\Column(length: 255)]
    private ?string $lien_source = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdAtelier(): ?AteliersPlantes
    {
        return $this->Id_Atelier;
    }

    public function setIdAtelier(?AteliersPlantes $Id_Atelier): static
    {
        $this->Id_Atelier = $Id_Atelier;

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
