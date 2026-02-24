<?php

namespace App\Entity;

use App\Repository\MediaEchafaudagesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MediaEchafaudagesRepository::class)]
class MediaEchafaudages
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'mediaEchafaudages')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Echafaudages $Id_Echafaudage = null;

    #[ORM\Column(length: 255)]
    private ?string $lienSource = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdEchafaudage(): ?Echafaudages
    {
        return $this->Id_Echafaudage;
    }

    public function setIdEchafaudage(?Echafaudages $Id_Echafaudage): static
    {
        $this->Id_Echafaudage = $Id_Echafaudage;

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
