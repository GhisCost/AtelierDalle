<?php

namespace App\Entity;

use App\Repository\TexteEvenementCultureRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TexteEvenementCultureRepository::class)]
class TexteEvenementCulture
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $contenu = null;

    #[ORM\ManyToOne(inversedBy: 'texteEvenementCultures')]
    #[ORM\JoinColumn(nullable: false)]
    private ?EvenementCulture $evenementCulture = null;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getEvenementCulture(): ?EvenementCulture
    {
        return $this->evenementCulture;
    }

    public function setEvenementCulture(?EvenementCulture $evenementCulture): static
    {
        $this->evenementCulture = $evenementCulture;

        return $this;
    }
}
