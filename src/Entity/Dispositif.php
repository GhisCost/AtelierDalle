<?php

namespace App\Entity;

use App\Repository\DispositifRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DispositifRepository::class)]
class Dispositif
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Nom = null;

    /**
     * @var Collection<int, MediaDispositif>
     */
    #[ORM\OneToMany(targetEntity: MediaDispositif::class, mappedBy: 'Dispositif', orphanRemoval: true)]
    private Collection $mediaDispositifs;

    /**
     * @var Collection<int, DescriptionDispositif>
     */
    #[ORM\OneToMany(targetEntity: DescriptionDispositif::class, mappedBy: 'Dispositif')]
    private Collection $descriptionDispositifs;

    public function __construct()
    {
        $this->mediaDispositifs = new ArrayCollection();
        $this->descriptionDispositifs = new ArrayCollection();
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

    /**
     * @return Collection<int, MediaDispositif>
     */
    public function getMediaDispositifs(): Collection
    {
        return $this->mediaDispositifs;
    }

    public function addMediaDispositif(MediaDispositif $mediaDispositif): static
    {
        if (!$this->mediaDispositifs->contains($mediaDispositif)) {
            $this->mediaDispositifs->add($mediaDispositif);
            $mediaDispositif->setDispositif($this);
        }

        return $this;
    }

    public function removeMediaDispositif(MediaDispositif $mediaDispositif): static
    {
        if ($this->mediaDispositifs->removeElement($mediaDispositif)) {
            // set the owning side to null (unless already changed)
            if ($mediaDispositif->getDispositif() === $this) {
                $mediaDispositif->setDispositif(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, DescriptionDispositif>
     */
    public function getDescriptionDispositifs(): Collection
    {
        return $this->descriptionDispositifs;
    }

    public function addDescriptionDispositif(DescriptionDispositif $descriptionDispositif): static
    {
        if (!$this->descriptionDispositifs->contains($descriptionDispositif)) {
            $this->descriptionDispositifs->add($descriptionDispositif);
            $descriptionDispositif->setDispositif($this);
        }

        return $this;
    }

    public function removeDescriptionDispositif(DescriptionDispositif $descriptionDispositif): static
    {
        if ($this->descriptionDispositifs->removeElement($descriptionDispositif)) {
            // set the owning side to null (unless already changed)
            if ($descriptionDispositif->getDispositif() === $this) {
                $descriptionDispositif->setDispositif(null);
            }
        }

        return $this;
    }
}
