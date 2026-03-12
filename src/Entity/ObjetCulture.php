<?php

namespace App\Entity;

use App\Repository\ObjetCultureRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ObjetCultureRepository::class)]
class ObjetCulture
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Nom = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $Description = null;

    #[ORM\ManyToOne(inversedBy: 'objetCultures')]
    #[ORM\JoinColumn(nullable: false)]
    private ?CultureDuMonde $Culture = null;

    /**
     * @var Collection<int, MediaObjetCulture>
     */
    #[ORM\OneToMany(targetEntity: MediaObjetCulture::class, mappedBy: 'objetCulture')]
    private Collection $mediaObjetCultures;

    public function __construct()
    {
        $this->mediaObjetCultures = new ArrayCollection();
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

    public function getCulture(): ?CultureDuMonde
    {
        return $this->Culture;
    }

    public function setCulture(?CultureDuMonde $Culture): static
    {
        $this->Culture = $Culture;

        return $this;
    }

    /**
     * @return Collection<int, MediaObjetCulture>
     */
    public function getMediaObjetCultures(): Collection
    {
        return $this->mediaObjetCultures;
    }

    public function addMediaObjetCulture(MediaObjetCulture $mediaObjetCulture): static
    {
        if (!$this->mediaObjetCultures->contains($mediaObjetCulture)) {
            $this->mediaObjetCultures->add($mediaObjetCulture);
            $mediaObjetCulture->setObjetCulture($this);
        }

        return $this;
    }

    public function removeMediaObjetCulture(MediaObjetCulture $mediaObjetCulture): static
    {
        if ($this->mediaObjetCultures->removeElement($mediaObjetCulture)) {
            // set the owning side to null (unless already changed)
            if ($mediaObjetCulture->getObjetCulture() === $this) {
                $mediaObjetCulture->setObjetCulture(null);
            }
        }

        return $this;
    }

   
}
