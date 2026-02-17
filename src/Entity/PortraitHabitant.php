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
    private ?string $Prenom = null;

    #[ORM\Column(length: 20)]
    private ?string $Batiment = null;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $culture = null;

    /**
     * @var Collection<int, MediaPortrait>
     */
    #[ORM\OneToMany(targetEntity: MediaPortrait::class, mappedBy: 'Id_Portrait')]
    private Collection $mediaPortraits;

    /**
     * @var Collection<int, TextePortrait>
     */
    #[ORM\OneToMany(targetEntity: TextePortrait::class, mappedBy: 'Id_PortraitHabitant')]
    private Collection $textePortraits;

    /**
     * @var Collection<int, ObjetHabitant>
     */
    #[ORM\OneToMany(targetEntity: ObjetHabitant::class, mappedBy: 'Id_Habitant')]
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
        return $this->Prenom;
    }

    public function setPrenom(string $Prenom): static
    {
        $this->Prenom = $Prenom;

        return $this;
    }

    public function getBatiment(): ?string
    {
        return $this->Batiment;
    }

    public function setBatiment(string $Batiment): static
    {
        $this->Batiment = $Batiment;

        return $this;
    }

    public function getCulture(): ?string
    {
        return $this->culture;
    }

    public function setCulture(?string $culture): static
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

    public function addMediaPortrait(MediaPortrait $mediaPortrait): static
    {
        if (!$this->mediaPortraits->contains($mediaPortrait)) {
            $this->mediaPortraits->add($mediaPortrait);
            $mediaPortrait->setIdPortrait($this);
        }

        return $this;
    }

    public function removeMediaPortrait(MediaPortrait $mediaPortrait): static
    {
        if ($this->mediaPortraits->removeElement($mediaPortrait)) {
            // set the owning side to null (unless already changed)
            if ($mediaPortrait->getIdPortrait() === $this) {
                $mediaPortrait->setIdPortrait(null);
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
            $textePortrait->setIdPortraitHabitant($this);
        }

        return $this;
    }

    public function removeTextePortrait(TextePortrait $textePortrait): static
    {
        if ($this->textePortraits->removeElement($textePortrait)) {
            // set the owning side to null (unless already changed)
            if ($textePortrait->getIdPortraitHabitant() === $this) {
                $textePortrait->setIdPortraitHabitant(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, ObjetHabitant>
     */
    public function getObjetHabitants(): Collection
    {
        return $this->objetHabitants;
    }

    public function addObjetHabitant(ObjetHabitant $objetHabitant): static
    {
        if (!$this->objetHabitants->contains($objetHabitant)) {
            $this->objetHabitants->add($objetHabitant);
            $objetHabitant->setIdHabitant($this);
        }

        return $this;
    }

    public function removeObjetHabitant(ObjetHabitant $objetHabitant): static
    {
        if ($this->objetHabitants->removeElement($objetHabitant)) {
            // set the owning side to null (unless already changed)
            if ($objetHabitant->getIdHabitant() === $this) {
                $objetHabitant->setIdHabitant(null);
            }
        }

        return $this;
    }
}
