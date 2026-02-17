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
    private ?PortraitHabitant $Id_PortraitHabitant = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $Contenu = null;

    #[ORM\ManyToOne(inversedBy: 'textePortraits')]
    private ?PortraitNonHabitant $Id_PortraitNonHabitant = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdPortraitHabitant(): ?PortraitHabitant
    {
        return $this->Id_PortraitHabitant;
    }

    public function setIdPortraitHabitant(?PortraitHabitant $Id_PortraitHabitant): static
    {
        $this->Id_PortraitHabitant = $Id_PortraitHabitant;

        return $this;
    }

    public function getContenu(): ?string
    {
        return $this->Contenu;
    }

    public function setContenu(string $Contenu): static
    {
        $this->Contenu = $Contenu;

        return $this;
    }

    public function getIdPortraitNonHabitant(): ?PortraitNonHabitant
    {
        return $this->Id_PortraitNonHabitant;
    }

    public function setIdPortraitNonHabitant(?PortraitNonHabitant $Id_PortraitNonHabitant): static
    {
        $this->Id_PortraitNonHabitant = $Id_PortraitNonHabitant;

        return $this;
    }
}
