<?php

namespace App\Entity;

use App\Repository\BruitChantierRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BruitChantierRepository::class)]
class BruitChantier
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Nom = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $Description = null;

    /**
     * @var Collection<int, MediaBruitChantier>
     */
    #[ORM\OneToMany(targetEntity: MediaBruitChantier::class, mappedBy: 'Id_BruitChantier')]
    private Collection $mediaBruitChantiers;

    public function __construct()
    {
        $this->mediaBruitChantiers = new ArrayCollection();
    }

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

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(string $Description): static
    {
        $this->Description = $Description;

        return $this;
    }

    /**
     * @return Collection<int, MediaBruitChantier>
     */
    public function getMediaBruitChantiers(): Collection
    {
        return $this->mediaBruitChantiers;
    }

    public function addMediaBruitChantier(MediaBruitChantier $mediaBruitChantier): static
    {
        if (!$this->mediaBruitChantiers->contains($mediaBruitChantier)) {
            $this->mediaBruitChantiers->add($mediaBruitChantier);
            $mediaBruitChantier->setBruitChantier($this);
        }

        return $this;
    }

    public function removeMediaBruitChantier(MediaBruitChantier $mediaBruitChantier): static
    {
        if ($this->mediaBruitChantiers->removeElement($mediaBruitChantier)) {
            // set the owning side to null (unless already changed)
            if ($mediaBruitChantier->getBruitChantier() === $this) {
                $mediaBruitChantier->setBruitChantier(null);
            }
        }

        return $this;
    }
}
