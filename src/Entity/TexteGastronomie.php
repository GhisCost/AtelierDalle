<?php

namespace App\Entity;

use App\Repository\TexteGastronomieRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TexteGastronomieRepository::class)]
class TexteGastronomie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'contenu')]
    #[ORM\JoinColumn(nullable: false)]
    private ?GastronomieDalle $Id_Gastronomie = null;

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
}
