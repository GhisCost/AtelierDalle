<?php

namespace App\Entity;

use App\Repository\MediaAppartementRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MediaAppartementRepository::class)]
class MediaAppartement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'mediaAppartements')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Appartement $Id_Appartement = null;

    #[ORM\Column(length: 255)]
    private ?string $contenu = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdAppartement(): ?Appartement
    {
        return $this->Id_Appartement;
    }

    public function setIdAppartement(?Appartement $Id_Appartement): static
    {
        $this->Id_Appartement = $Id_Appartement;

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
