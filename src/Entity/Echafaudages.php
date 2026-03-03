<?php

namespace App\Entity;

use App\Repository\EchafaudagesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EchafaudagesRepository::class)]
class Echafaudages
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
     * @var Collection<int, MediaEchafaudages>
     */
    #[ORM\OneToMany(targetEntity: MediaEchafaudages::class, mappedBy: 'Id_Echafaudage')]
    private Collection $mediaEchafaudages;

    public function __construct()
    {
        $this->mediaEchafaudages = new ArrayCollection();
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
     * @return Collection<int, MediaEchafaudages>
     */
    public function getMediaEchafaudages(): Collection
    {
        return $this->mediaEchafaudages;
    }

    public function addMediaEchafaudage(MediaEchafaudages $mediaEchafaudage): static
    {
        if (!$this->mediaEchafaudages->contains($mediaEchafaudage)) {
            $this->mediaEchafaudages->add($mediaEchafaudage);
            $mediaEchafaudage->setEchafaudage($this);
        }

        return $this;
    }

    public function removeMediaEchafaudage(MediaEchafaudages $mediaEchafaudage): static
    {
        if ($this->mediaEchafaudages->removeElement($mediaEchafaudage)) {
            // set the owning side to null (unless already changed)
            if ($mediaEchafaudage->getEchafaudage() === $this) {
                $mediaEchafaudage->setEchafaudage(null);
            }
        }

        return $this;
    }
}
