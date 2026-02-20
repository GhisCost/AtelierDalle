<?php

namespace App\Entity;

use App\Repository\MediaCultureRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MediaCultureRepository::class)]
class MediaCulture
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'mediaCultures')]
    private ?CultureDuMonde $Id_CultureMonde = null;

    #[ORM\Column(length: 255)]
    private ?string $lien_source = null;

    #[ORM\ManyToOne(inversedBy: 'mediaCultures')]
    private ?CultureUrbaine $Id_CultureUrbaine = null;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getLienSource(): ?string
    {
        return $this->lien_source;
    }

    public function setLienSource(string $lien_source): static
    {
        $this->lien_source = $lien_source;

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
