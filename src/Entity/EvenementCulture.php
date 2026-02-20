<?php

namespace App\Entity;

use App\Repository\EvenementCultureRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EvenementCultureRepository::class)]
class EvenementCulture
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Nom = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $dateDebut = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $DateFin = null;

    #[ORM\ManyToOne(inversedBy: 'evenementCultures')]
    private ?CultureDuMonde $Id_CultureMonde = null;

    #[ORM\ManyToOne(inversedBy: 'evenementCultures')]
    private ?CultureUrbaine $Id_CultureUrbaine = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(string $Nom): static
    {
        $this->Nom = $Nom;

        return $this;
    }

    public function getDateDebut(): ?\DateTime
    {
        return $this->dateDebut;
    }

    public function setDateDebut(\DateTime $dateDebut): static
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    public function getDateFin(): ?\DateTime
    {
        return $this->DateFin;
    }

    public function setDateFin(\DateTime $DateFin): static
    {
        $this->DateFin = $DateFin;

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
