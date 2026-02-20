<?php

namespace App\Entity;

use App\Repository\MediaEvenementPlanteRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MediaEvenementPlanteRepository::class)]
class MediaEvenementPlante
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'mediaEvenementPlantes')]
    private ?EvenementPlantes $Id_evenementPlantes = null;

    #[ORM\Column(length: 255)]
    private ?string $lien_source = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdEvenementPlantes(): ?EvenementPlantes
    {
        return $this->Id_evenementPlantes;
    }

    public function setIdEvenementPlantes(?EvenementPlantes $Id_evenementPlantes): static
    {
        $this->Id_evenementPlantes = $Id_evenementPlantes;

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
}
