<?php

namespace App\Entity;

use App\Repository\EvenementPlantesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EvenementPlantesRepository::class)]
class EvenementPlantes
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $date = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $resume = null;

    /**
     * @var Collection<int, MediaEvenementPlante>
     */
    #[ORM\OneToMany(targetEntity: MediaEvenementPlante::class, mappedBy: 'evenementPlantes')]
    private Collection $mediaEvenementPlantes;

    /**
     * @var Collection<int, TexteEvenementPlantes>
     */
    #[ORM\OneToMany(targetEntity: TexteEvenementPlantes::class, mappedBy: 'EvenementPlantes')]
    private Collection $texteEvenementPlantes;

    public function __construct()
    {
        $this->mediaEvenementPlantes = new ArrayCollection();
        $this->texteEvenementPlantes = new ArrayCollection();
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
     * @return Collection<int, MediaEvenementPlante>
     */
    public function getMediaEvenementPlantes(): Collection
    {
        return $this->mediaEvenementPlantes;
    }

    public function addMediaEvenementPlante(MediaEvenementPlante $mediaEvenementPlante): static
    {
        if (!$this->mediaEvenementPlantes->contains($mediaEvenementPlante)) {
            $this->mediaEvenementPlantes->add($mediaEvenementPlante);
            $mediaEvenementPlante->setEvenementPlantes($this);
        }

        return $this;
    }

    public function removeMediaEvenementPlante(MediaEvenementPlante $mediaEvenementPlante): static
    {
        if ($this->mediaEvenementPlantes->removeElement($mediaEvenementPlante)) {
            // set the owning side to null (unless already changed)
            if ($mediaEvenementPlante->getEvenementPlantes() === $this) {
                $mediaEvenementPlante->setEvenementPlantes(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, TexteEvenementPlantes>
     */
    public function getTexteEvenementPlantes(): Collection
    {
        return $this->texteEvenementPlantes;
    }

    public function addTexteEvenementPlante(TexteEvenementPlantes $texteEvenementPlante): static
    {
        if (!$this->texteEvenementPlantes->contains($texteEvenementPlante)) {
            $this->texteEvenementPlantes->add($texteEvenementPlante);
            $texteEvenementPlante->setEvenementPlantes($this);
        }

        return $this;
    }

    public function removeTexteEvenementPlante(TexteEvenementPlantes $texteEvenementPlante): static
    {
        if ($this->texteEvenementPlantes->removeElement($texteEvenementPlante)) {
            // set the owning side to null (unless already changed)
            if ($texteEvenementPlante->getEvenementPlantes() === $this) {
                $texteEvenementPlante->setEvenementPlantes(null);
            }
        }

        return $this;
    }
}
