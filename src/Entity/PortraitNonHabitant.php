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
    private ?string $Prenom = null;

    #[ORM\Column(length: 50)]
    private ?string $Role = null;

    /**
     * @var Collection<int, MediaPortrait>
     */
    #[ORM\OneToMany(targetEntity: MediaPortrait::class, mappedBy: 'Id_Portrait_NonHabitant')]
    private Collection $mediaPortraits;

    /**
     * @var Collection<int, TextePortrait>
     */
    #[ORM\OneToMany(targetEntity: TextePortrait::class, mappedBy: 'Id_PortraitNonHabitant')]
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
        return $this->Prenom;
    }

    public function setPrenom(string $Prenom): static
    {
        $this->Prenom = $Prenom;

        return $this;
    }

    public function getRole(): ?string
    {
        return $this->Role;
    }

    public function setRole(string $Role): static
    {
        $this->Role = $Role;

        return $this;
    }

    /**
     * @return Collection<int, MediaPortrait>
     */
    public function getMediaPortraits(): Collection
    {
        return $this->mediaPortraits;
    }

    public function addMediaPortrait(MediaPortrait $mediaPortrait): static
    {
        if (!$this->mediaPortraits->contains($mediaPortrait)) {
            $this->mediaPortraits->add($mediaPortrait);
            $mediaPortrait->setIdPortraitNonHabitant($this);
        }

        return $this;
    }

    public function removeMediaPortrait(MediaPortrait $mediaPortrait): static
    {
        if ($this->mediaPortraits->removeElement($mediaPortrait)) {
            // set the owning side to null (unless already changed)
            if ($mediaPortrait->getIdPortraitNonHabitant() === $this) {
                $mediaPortrait->setIdPortraitNonHabitant(null);
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

    public function addTextePortrait(TextePortrait $textePortrait): static
    {
        if (!$this->textePortraits->contains($textePortrait)) {
            $this->textePortraits->add($textePortrait);
            $textePortrait->setIdPortraitNonHabitant($this);
        }

        return $this;
    }

    public function removeTextePortrait(TextePortrait $textePortrait): static
    {
        if ($this->textePortraits->removeElement($textePortrait)) {
            // set the owning side to null (unless already changed)
            if ($textePortrait->getIdPortraitNonHabitant() === $this) {
                $textePortrait->setIdPortraitNonHabitant(null);
            }
        }

        return $this;
    }
}
