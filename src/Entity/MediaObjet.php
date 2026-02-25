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
    private ?ObjetHabitant $objet = null;

    #[ORM\Column(length: 255)]
    private ?string $contenu = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getObjet(): ?ObjetHabitant
    {
        return $this->objet;
    }

    public function setObjet(?ObjetHabitant $objet): self
    {
        $this->objet = $objet;
        return $this;
    }

    public function getContenu(): ?string
    {
        return $this->contenu;
    }

    public function setContenu(string $contenu): self
    {
        $this->contenu = $contenu;
        return $this;
    }
}