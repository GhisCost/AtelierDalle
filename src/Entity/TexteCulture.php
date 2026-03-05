<?php

namespace App\Entity;

use App\Repository\TexteCultureRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TexteCultureRepository::class)]
class TexteCulture
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $contenu = null;

    #[ORM\ManyToOne(inversedBy: 'texteCultures')]
    private ?CultureDuMonde $CultureMonde = null;

    #[ORM\ManyToOne(inversedBy: 'texteCultures')]
    private ?CultureUrbaine $CultureUrbaine = null;

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

    public function getCultureMonde(): ?CultureDuMonde
    {
        return $this->CultureMonde;
    }

    public function setCultureMonde(?CultureDuMonde $CultureMonde): static
    {
        $this->CultureMonde = $CultureMonde;

        return $this;
    }

    public function getCultureUrbaine(): ?CultureUrbaine
    {
        return $this->CultureUrbaine;
    }

    public function setCultureUrbaine(?CultureUrbaine $CultureUrbaine): static
    {
        $this->CultureUrbaine = $CultureUrbaine;

        return $this;
    }
}
