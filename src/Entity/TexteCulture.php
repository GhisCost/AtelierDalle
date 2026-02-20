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
    private ?CultureDuMonde $Id_CultureMonde = null;

    #[ORM\ManyToOne(inversedBy: 'texteCultures')]
    private ?CultureUrbaine $Id_CultureUrbaine = null;

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

    public function getIdCultureMonde(): ?CultureDuMonde
    {
        return $this->Id_CultureMonde;
    }

    public function setIdCultureMonde(?CultureDuMonde $Id_CultureMonde): static
    {
        $this->Id_CultureMonde = $Id_CultureMonde;

        return $this;
    }

    public function getIdCultureUrbaine(): ?CultureUrbaine
    {
        return $this->Id_CultureUrbaine;
    }

    public function setIdCultureUrbaine(?CultureUrbaine $Id_CultureUrbaine): static
    {
        $this->Id_CultureUrbaine = $Id_CultureUrbaine;

        return $this;
    }
}
