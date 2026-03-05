<?php

namespace App\Entity;

use App\Repository\TexteEvenementPlantesRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TexteEvenementPlantesRepository::class)]
class TexteEvenementPlantes
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'texteEvenementPlantes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?EvenementPlantes $EvenementPlantes = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $contenu = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEvenementPlantes(): ?EvenementPlantes
    {
        return $this->EvenementPlantes;
    }

    public function setEvenementPlantes(?EvenementPlantes $EvenementPlantes): static
    {
        $this->EvenementPlantes = $EvenementPlantes;

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
