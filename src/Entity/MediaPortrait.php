<?php

namespace App\Entity;

use App\Repository\MediaPortraitRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MediaPortraitRepository::class)]
class MediaPortrait
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'mediaPortraits')]
    private ?PortraitHabitant $Id_Portrait = null;

    #[ORM\Column(length: 255)]
    private ?string $contenu = null;

    #[ORM\ManyToOne(inversedBy: 'mediaPortraits')]
    private ?PortraitNonHabitant $Id_Portrait_NonHabitant = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdPortrait(): ?PortraitHabitant
    {
        return $this->Id_Portrait;
    }

    public function setIdPortrait(?PortraitHabitant $Id_Portrait): static
    {
        $this->Id_Portrait = $Id_Portrait;

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

    public function getIdPortraitNonHabitant(): ?PortraitNonHabitant
    {
        return $this->Id_Portrait_NonHabitant;
    }

    public function setIdPortraitNonHabitant(?PortraitNonHabitant $Id_Portrait_NonHabitant): static
    {
        $this->Id_Portrait_NonHabitant = $Id_Portrait_NonHabitant;

        return $this;
    }
}
