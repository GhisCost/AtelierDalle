<?php

namespace App\Entity;

use App\Repository\AppartementRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AppartementRepository::class)]
class Appartement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $batiment = null;

    #[ORM\Column(length: 255)]
    private ?string $escalier = null;

    #[ORM\Column]
    private ?int $etage = null;

    /**
     * @var Collection<int, MediaAppartement>
     */
    #[ORM\OneToMany(targetEntity: MediaAppartement::class, mappedBy: 'Id_Appartement')]
    private Collection $mediaAppartements;

    public function __construct()
    {
        $this->mediaAppartements = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBatiment(): ?string
    {
        return $this->batiment;
    }

    public function setBatiment(string $batiment): static
    {
        $this->batiment = $batiment;

        return $this;
    }

    public function getEscalier(): ?string
    {
        return $this->escalier;
    }

    public function setEscalier(string $escalier): static
    {
        $this->escalier = $escalier;

        return $this;
    }

    public function getEtage(): ?int
    {
        return $this->etage;
    }

    public function setEtage(int $etage): static
    {
        $this->etage = $etage;

        return $this;
    }

    /**
     * @return Collection<int, MediaAppartement>
     */
    public function getMediaAppartements(): Collection
    {
        return $this->mediaAppartements;
    }

    public function addMediaAppartement(MediaAppartement $mediaAppartement): static
    {
        if (!$this->mediaAppartements->contains($mediaAppartement)) {
            $this->mediaAppartements->add($mediaAppartement);
            $mediaAppartement->setAppartement($this);
        }

        return $this;
    }

    public function removeMediaAppartement(MediaAppartement $mediaAppartement): static
    {
        if ($this->mediaAppartements->removeElement($mediaAppartement)) {
            // set the owning side to null (unless already changed)
            if ($mediaAppartement->getAppartement() === $this) {
                $mediaAppartement->setAppartement(null);
            }
        }

        return $this;
    }
}
