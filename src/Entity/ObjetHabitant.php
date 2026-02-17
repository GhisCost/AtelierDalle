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
    private ?PortraitHabitant $Id_Habitant = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    /**
     * @var Collection<int, MediaObjet>
     */
    #[ORM\OneToMany(targetEntity: MediaObjet::class, mappedBy: 'Id_Objet')]
    private Collection $mediaObjets;

    public function __construct()
    {
        $this->mediaObjets = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdHabitant(): ?PortraitHabitant
    {
        return $this->Id_Habitant;
    }

    public function setIdHabitant(?PortraitHabitant $Id_Habitant): static
    {
        $this->Id_Habitant = $Id_Habitant;

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
     * @return Collection<int, MediaObjet>
     */
    public function getMediaObjets(): Collection
    {
        return $this->mediaObjets;
    }

    public function addMediaObjet(MediaObjet $mediaObjet): static
    {
        if (!$this->mediaObjets->contains($mediaObjet)) {
            $this->mediaObjets->add($mediaObjet);
            $mediaObjet->setIdObjet($this);
        }

        return $this;
    }

    public function removeMediaObjet(MediaObjet $mediaObjet): static
    {
        if ($this->mediaObjets->removeElement($mediaObjet)) {
            // set the owning side to null (unless already changed)
            if ($mediaObjet->getIdObjet() === $this) {
                $mediaObjet->setIdObjet(null);
            }
        }

        return $this;
    }
}
