<?php

namespace App\Entity;

use App\Repository\ObjetHabitantRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ObjetHabitantRepository::class)]
class ObjetHabitant
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'objetHabitants')]
    #[ORM\JoinColumn(nullable: false)]
    private ?PortraitHabitant $habitant = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\OneToMany(mappedBy: 'objet', targetEntity: MediaObjet::class)]
    private Collection $mediaObjets;

    public function __construct()
    {
        $this->mediaObjets = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHabitant(): ?PortraitHabitant
    {
        return $this->habitant;
    }

    public function setHabitant(?PortraitHabitant $habitant): self
    {
        $this->habitant = $habitant;
        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return Collection<int, MediaObjet>
     */
    public function getMediaObjets(): Collection
    {
        return $this->mediaObjets;
    }

    public function addMediaObjet(MediaObjet $mediaObjet): self
    {
        if (!$this->mediaObjets->contains($mediaObjet)) {
            $this->mediaObjets->add($mediaObjet);
            $mediaObjet->setObjet($this);
        }

        return $this;
    }

    public function removeMediaObjet(MediaObjet $mediaObjet): self
    {
        if ($this->mediaObjets->removeElement($mediaObjet)) {
            if ($mediaObjet->getObjet() === $this) {
                $mediaObjet->setObjet(null);
            }
        }

        return $this;
    }
}