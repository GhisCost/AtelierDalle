<?php

namespace App\Entity;

use App\Repository\PortraitNonHabitantRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PortraitNonHabitantRepository::class)]
class PortraitNonHabitant
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $prenom = null;

    #[ORM\Column(length: 50)]
    private ?string $role = null;

    #[ORM\OneToMany(mappedBy: 'portraitNonHabitant', targetEntity: MediaPortrait::class)]
    private Collection $mediaPortraits;

    #[ORM\OneToMany(mappedBy: 'portraitNonHabitant', targetEntity: TextePortrait::class)]
    private Collection $textePortraits;

    public function __construct()
    {
        $this->mediaPortraits = new ArrayCollection();
        $this->textePortraits = new ArrayCollection();
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

    public function getRole(): ?string
    {
        return $this->role;
    }

    public function setRole(string $role): self
    {
        $this->role = $role;
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
            $mediaPortrait->setPortraitNonHabitant($this);
        }

        return $this;
    }

    public function removeMediaPortrait(MediaPortrait $mediaPortrait): self
    {
        if ($this->mediaPortraits->removeElement($mediaPortrait)) {
            if ($mediaPortrait->getPortraitNonHabitant() === $this) {
                $mediaPortrait->setPortraitNonHabitant(null);
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
            $textePortrait->setPortraitNonHabitant($this);
        }

        return $this;
    }

    public function removeTextePortrait(TextePortrait $textePortrait): self
    {
        if ($this->textePortraits->removeElement($textePortrait)) {
            if ($textePortrait->getPortraitNonHabitant() === $this) {
                $textePortrait->setPortraitNonHabitant(null);
            }
        }

        return $this;
    }

    public function __toString(): string
    {
        return $this->prenom ?? '';
    }
}