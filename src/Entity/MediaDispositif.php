<?php

namespace App\Entity;

use App\Repository\MediaDispositifRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MediaDispositifRepository::class)]
class MediaDispositif
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'mediaDispositifs')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Dispositif $Id_Dispositif = null;

    #[ORM\Column(length: 255)]
    private ?string $contenu = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdDispositif(): ?Dispositif
    {
        return $this->Id_Dispositif;
    }

    public function setIdDispositif(?Dispositif $Id_Dispositif): static
    {
        $this->Id_Dispositif = $Id_Dispositif;

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
