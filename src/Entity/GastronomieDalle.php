<?php

namespace App\Entity;

use App\Repository\GastronomieDalleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GastronomieDalleRepository::class)]
class GastronomieDalle
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Nom = null;

    #[ORM\ManyToOne(inversedBy: 'gastronomieDalles')]
    private ?CultureDuMonde $Id_CultureMonde = null;

    /**
     * @var Collection<int, MediaGastronomie>
     */
    #[ORM\OneToMany(targetEntity: MediaGastronomie::class, mappedBy: 'Id_Gastronomie')]
    private Collection $mediaGastronomies;

    /**
     * @var Collection<int, TexteGastronomie>
     */
    #[ORM\OneToMany(targetEntity: TexteGastronomie::class, mappedBy: 'Id_Gastronomie')]
    private Collection $contenu;

    public function __construct()
    {
        $this->mediaGastronomies = new ArrayCollection();
        $this->contenu = new ArrayCollection();
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

    public function getIdCultureMonde(): ?CultureDuMonde
    {
        return $this->Id_CultureMonde;
    }

    public function setIdCultureMonde(?CultureDuMonde $Id_CultureMonde): static
    {
        $this->Id_CultureMonde = $Id_CultureMonde;

        return $this;
    }

    /**
     * @return Collection<int, MediaGastronomie>
     */
    public function getMediaGastronomies(): Collection
    {
        return $this->mediaGastronomies;
    }

    public function addMediaGastronomy(MediaGastronomie $mediaGastronomy): static
    {
        if (!$this->mediaGastronomies->contains($mediaGastronomy)) {
            $this->mediaGastronomies->add($mediaGastronomy);
            $mediaGastronomy->setGastronomie($this);
        }

        return $this;
    }

    public function removeMediaGastronomy(MediaGastronomie $mediaGastronomy): static
    {
        if ($this->mediaGastronomies->removeElement($mediaGastronomy)) {
            // set the owning side to null (unless already changed)
            if ($mediaGastronomy->getGastronomie() === $this) {
                $mediaGastronomy->setGastronomie(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, TexteGastronomie>
     */
    public function getContenu(): Collection
    {
        return $this->contenu;
    }

    public function addContenu(TexteGastronomie $contenu): static
    {
        if (!$this->contenu->contains($contenu)) {
            $this->contenu->add($contenu);
            $contenu->setIdGastronomie($this);
        }

        return $this;
    }

    public function removeContenu(TexteGastronomie $contenu): static
    {
        if ($this->contenu->removeElement($contenu)) {
            // set the owning side to null (unless already changed)
            if ($contenu->getIdGastronomie() === $this) {
                $contenu->setIdGastronomie(null);
            }
        }

        return $this;
    }
}
