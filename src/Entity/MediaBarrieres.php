<?php

namespace App\Entity;

use App\Repository\MediaBarrieresRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MediaBarrieresRepository::class)]
class MediaBarrieres
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'mediaBarrieres')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Barrieres $Id_Barrieres = null;

    #[ORM\Column(length: 255)]
    private ?string $lienSource = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdBarrieres(): ?Barrieres
    {
        return $this->Id_Barrieres;
    }

    public function setIdBarrieres(?Barrieres $Id_Barrieres): static
    {
        $this->Id_Barrieres = $Id_Barrieres;

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
