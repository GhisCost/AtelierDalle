<?php

namespace App\Entity;

use App\Repository\AteliersPlantesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AteliersPlantesRepository::class)]
class AteliersPlantes
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $date = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $resume = null;

    /**
     * @var Collection<int, MediaAtelier>
     */
    #[ORM\OneToMany(targetEntity: MediaAtelier::class, mappedBy: 'Id_Atelier')]
    private Collection $mediaAteliers;

    /**
     * @var Collection<int, TexteAteliers>
     */
    #[ORM\OneToMany(targetEntity: TexteAteliers::class, mappedBy: 'id_Atelier')]
    private Collection $texteAteliers;

    public function __construct()
    {
        $this->mediaAteliers = new ArrayCollection();
        $this->texteAteliers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTime
    {
        return $this->date;
    }

    public function setDate(\DateTime $date): static
    {
        $this->date = $date;

        return $this;
    }

    public function getResume(): ?string
    {
        return $this->resume;
    }

    public function setResume(string $resume): static
    {
        $this->resume = $resume;

        return $this;
    }

    /**
     * @return Collection<int, MediaAtelier>
     */
    public function getMediaAteliers(): Collection
    {
        return $this->mediaAteliers;
    }

    public function addMediaAtelier(MediaAtelier $mediaAtelier): static
    {
        if (!$this->mediaAteliers->contains($mediaAtelier)) {
            $this->mediaAteliers->add($mediaAtelier);
            $mediaAtelier->setIdAtelier($this);
        }

        return $this;
    }

    public function removeMediaAtelier(MediaAtelier $mediaAtelier): static
    {
        if ($this->mediaAteliers->removeElement($mediaAtelier)) {
            // set the owning side to null (unless already changed)
            if ($mediaAtelier->getIdAtelier() === $this) {
                $mediaAtelier->setIdAtelier(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, TexteAteliers>
     */
    public function getTexteAteliers(): Collection
    {
        return $this->texteAteliers;
    }

    public function addTexteAtelier(TexteAteliers $texteAtelier): static
    {
        if (!$this->texteAteliers->contains($texteAtelier)) {
            $this->texteAteliers->add($texteAtelier);
            $texteAtelier->setIdAtelier($this);
        }

        return $this;
    }

    public function removeTexteAtelier(TexteAteliers $texteAtelier): static
    {
        if ($this->texteAteliers->removeElement($texteAtelier)) {
            // set the owning side to null (unless already changed)
            if ($texteAtelier->getIdAtelier() === $this) {
                $texteAtelier->setIdAtelier(null);
            }
        }

        return $this;
    }
}
