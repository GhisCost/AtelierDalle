<?php

namespace App\Entity;

use App\Repository\PortraitHabitantRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PortraitHabitantRepository::class)]
class PortraitHabitant
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $prenom = null;

    #[ORM\Column(length: 20)]
    private ?string $batiment = null;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $culture = null;

    #[ORM\OneToMany(mappedBy: 'portraitHabitant', targetEntity: MediaPortrait::class)]
    private Collection $mediaPortraits;

    #[ORM\OneToMany(mappedBy: 'portraitHabitant', targetEntity: TextePortrait::class)]
    private Collection $textePortraits;

    #[ORM\OneToMany(mappedBy: 'habitant', targetEntity: ObjetHabitant::class)]
    private Collection $objetHabitants;

    public function __construct()
    {
        $this->mediaPortraits = new ArrayCollection();
        $this->textePortraits = new ArrayCollection();
        $this->objetHabitants = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;
        return $this;
    }

    public function getBatiment(): ?string
    {
        return $this->batiment;
    }

    public function setBatiment(string $batiment): self
    {
        $this->batiment = $batiment;
        return $this;
    }

    public function getCulture(): ?string
    {
        return $this->culture;
    }

    public function setCulture(?string $culture): self
    {
        $this->culture = $culture;
        return $this;
    }

    /**
     * @return Collection<int, MediaPortrait>
     */
    public function getMediaPortraits(): Collection
    {
        return $this->mediaPortraits;
    }

    public function addMediaPortrait(MediaPortrait $mediaPortrait): self
    {
        if (!$this->mediaPortraits->contains($mediaPortrait)) {
            $this->mediaPortraits->add($mediaPortrait);
            $mediaPortrait->setPortraitHabitant($this);
        }
        return $this;
    }

    public function removeMediaPortrait(MediaPortrait $mediaPortrait): self
    {
        if ($this->mediaPortraits->removeElement($mediaPortrait)) {
            if ($mediaPortrait->getPortraitHabitant() === $this) {
                $mediaPortrait->setPortraitHabitant(null);
            }
        }
        return $this;
    }

    /**
     * @return Collection<int, TextePortrait>
     */
    public function getTextePortraits(): Collection
    {
        return $this->textePortraits;
    }

    public function addTextePortrait(TextePortrait $textePortrait): self
    {
        if (!$this->textePortraits->contains($textePortrait)) {
            $this->textePortraits->add($textePortrait);
            $textePortrait->setPortraitHabitant($this);
        }
        return $this;
    }

    public function removeTextePortrait(TextePortrait $textePortrait): self
    {
        if ($this->textePortraits->removeElement($textePortrait)) {
            if ($textePortrait->getPortraitHabitant() === $this) {
                $textePortrait->setPortraitHabitant(null);
            }
        }
        return $this;
    }

    public function __toString(): string
    {
        return $this->prenom ?? '';
    }
}