<?php

namespace App\Entity;

use App\Repository\TextePortraitRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TextePortraitRepository::class)]
class TextePortrait
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'textePortraits')]
    #[ORM\JoinColumn(nullable: true)]
    private ?PortraitHabitant $portraitHabitant = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $contenu = null;

    #[ORM\ManyToOne(inversedBy: 'textePortraits')]
    #[ORM\JoinColumn(nullable: true)]
    private ?PortraitNonHabitant $portraitNonHabitant = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPortraitHabitant(): ?PortraitHabitant
    {
        return $this->portraitHabitant;
    }

    public function setPortraitHabitant(?PortraitHabitant $portraitHabitant): self
    {
        $this->portraitHabitant = $portraitHabitant;
        return $this;
    }

    public function getPortraitNonHabitant(): ?PortraitNonHabitant
    {
        return $this->portraitNonHabitant;
    }

    public function setPortraitNonHabitant(?PortraitNonHabitant $portraitNonHabitant): self
    {
        $this->portraitNonHabitant = $portraitNonHabitant;
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