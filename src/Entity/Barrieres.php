<?php

namespace App\Entity;

use App\Repository\BarrieresRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BarrieresRepository::class)]
class Barrieres
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    /**
     * @var Collection<int, MediaBarrieres>
     */
    #[ORM\OneToMany(targetEntity: MediaBarrieres::class, mappedBy: 'Id_Barrieres')]
    private Collection $mediaBarrieres;

    public function __construct()
    {
        $this->mediaBarrieres = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection<int, MediaBarrieres>
     */
    public function getMediaBarrieres(): Collection
    {
        return $this->mediaBarrieres;
    }

    public function addMediaBarriere(MediaBarrieres $mediaBarriere): static
    {
        if (!$this->mediaBarrieres->contains($mediaBarriere)) {
            $this->mediaBarrieres->add($mediaBarriere);
            $mediaBarriere->setIdBarrieres($this);
        }

        return $this;
    }

    public function removeMediaBarriere(MediaBarrieres $mediaBarriere): static
    {
        if ($this->mediaBarrieres->removeElement($mediaBarriere)) {
            // set the owning side to null (unless already changed)
            if ($mediaBarriere->getIdBarrieres() === $this) {
                $mediaBarriere->setIdBarrieres(null);
            }
        }

        return $this;
    }
}
