<?php

namespace App\Entity;

use App\Repository\MediaObjetRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MediaObjetRepository::class)]
class MediaObjet
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'mediaObjets')]
    #[ORM\JoinColumn(nullable: false)]
    private ?ObjetHabitant $Id_Objet = null;

    #[ORM\Column(length: 255)]
    private ?string $contenu = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdObjet(): ?ObjetHabitant
    {
        return $this->Id_Objet;
    }

    public function setIdObjet(?ObjetHabitant $Id_Objet): static
    {
        $this->Id_Objet = $Id_Objet;

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
