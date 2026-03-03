<?php

namespace App\Entity;

use App\Repository\CultureDuMondeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CultureDuMondeRepository::class)]
class CultureDuMonde
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Nom = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $Description = null;

    /**
     * @var Collection<int, MediaCulture>
     */
    #[ORM\OneToMany(targetEntity: MediaCulture::class, mappedBy: 'Id_CultureMonde')]
    private Collection $mediaCultures;

    /**
     * @var Collection<int, EvenementCulture>
     */
    #[ORM\OneToMany(targetEntity: EvenementCulture::class, mappedBy: 'Id_CultureMonde')]
    private Collection $evenementCultures;

    /**
     * @var Collection<int, TexteCulture>
     */
    #[ORM\OneToMany(targetEntity: TexteCulture::class, mappedBy: 'Id_CultureMonde')]
    private Collection $texteCultures;

    /**
     * @var Collection<int, GastronomieDalle>
     */
    #[ORM\OneToMany(targetEntity: GastronomieDalle::class, mappedBy: 'Id_CultureMonde')]
    private Collection $gastronomieDalles;

    /**
     * @var Collection<int, ObjetCulture>
     */
    #[ORM\OneToMany(targetEntity: ObjetCulture::class, mappedBy: 'Id_Culture')]
    private Collection $objetCultures;

    /**
     * @var Collection<int, SymboleCulture>
     */
    #[ORM\OneToMany(targetEntity: SymboleCulture::class, mappedBy: 'Id_Culture')]
    private Collection $symboleCultures;

    public function __construct()
    {
        $this->mediaCultures = new ArrayCollection();
        $this->evenementCultures = new ArrayCollection();
        $this->texteCultures = new ArrayCollection();
        $this->gastronomieDalles = new ArrayCollection();
        $this->objetCultures = new ArrayCollection();
        $this->symboleCultures = new ArrayCollection();
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

    /**
     * @return Collection<int, MediaCulture>
     */
    public function getMediaCultures(): Collection
    {
        return $this->mediaCultures;
    }

    public function addMediaCulture(MediaCulture $mediaCulture): static
    {
        if (!$this->mediaCultures->contains($mediaCulture)) {
            $this->mediaCultures->add($mediaCulture);
            $mediaCulture->setCultureMonde($this);
        }

        return $this;
    }

    public function removeMediaCulture(MediaCulture $mediaCulture): static
    {
        if ($this->mediaCultures->removeElement($mediaCulture)) {
            // set the owning side to null (unless already changed)
            if ($mediaCulture->getCultureMonde() === $this) {
                $mediaCulture->setCultureMonde(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, EvenementCulture>
     */
    public function getEvenementCultures(): Collection
    {
        return $this->evenementCultures;
    }

    public function addEvenementCulture(EvenementCulture $evenementCulture): static
    {
        if (!$this->evenementCultures->contains($evenementCulture)) {
            $this->evenementCultures->add($evenementCulture);
            $evenementCulture->setIdCultureMonde($this);
        }

        return $this;
    }

    public function removeEvenementCulture(EvenementCulture $evenementCulture): static
    {
        if ($this->evenementCultures->removeElement($evenementCulture)) {
            // set the owning side to null (unless already changed)
            if ($evenementCulture->getIdCultureMonde() === $this) {
                $evenementCulture->setIdCultureMonde(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, TexteCulture>
     */
    public function getTexteCultures(): Collection
    {
        return $this->texteCultures;
    }

    public function addTexteCulture(TexteCulture $texteCulture): static
    {
        if (!$this->texteCultures->contains($texteCulture)) {
            $this->texteCultures->add($texteCulture);
            $texteCulture->setIdCultureMonde($this);
        }

        return $this;
    }

    public function removeTexteCulture(TexteCulture $texteCulture): static
    {
        if ($this->texteCultures->removeElement($texteCulture)) {
            // set the owning side to null (unless already changed)
            if ($texteCulture->getIdCultureMonde() === $this) {
                $texteCulture->setIdCultureMonde(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, GastronomieDalle>
     */
    public function getGastronomieDalles(): Collection
    {
        return $this->gastronomieDalles;
    }

    public function addGastronomieDalle(GastronomieDalle $gastronomieDalle): static
    {
        if (!$this->gastronomieDalles->contains($gastronomieDalle)) {
            $this->gastronomieDalles->add($gastronomieDalle);
            $gastronomieDalle->setIdCultureMonde($this);
        }

        return $this;
    }

    public function removeGastronomieDalle(GastronomieDalle $gastronomieDalle): static
    {
        if ($this->gastronomieDalles->removeElement($gastronomieDalle)) {
            // set the owning side to null (unless already changed)
            if ($gastronomieDalle->getIdCultureMonde() === $this) {
                $gastronomieDalle->setIdCultureMonde(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, ObjetCulture>
     */
    public function getObjetCultures(): Collection
    {
        return $this->objetCultures;
    }

    public function addObjetCulture(ObjetCulture $objetCulture): static
    {
        if (!$this->objetCultures->contains($objetCulture)) {
            $this->objetCultures->add($objetCulture);
            $objetCulture->setIdCulture($this);
        }

        return $this;
    }

    public function removeObjetCulture(ObjetCulture $objetCulture): static
    {
        if ($this->objetCultures->removeElement($objetCulture)) {
            // set the owning side to null (unless already changed)
            if ($objetCulture->getIdCulture() === $this) {
                $objetCulture->setIdCulture(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, SymboleCulture>
     */
    public function getSymboleCultures(): Collection
    {
        return $this->symboleCultures;
    }

    public function addSymboleCulture(SymboleCulture $symboleCulture): static
    {
        if (!$this->symboleCultures->contains($symboleCulture)) {
            $this->symboleCultures->add($symboleCulture);
            $symboleCulture->setIdCulture($this);
        }

        return $this;
    }

    public function removeSymboleCulture(SymboleCulture $symboleCulture): static
    {
        if ($this->symboleCultures->removeElement($symboleCulture)) {
            // set the owning side to null (unless already changed)
            if ($symboleCulture->getIdCulture() === $this) {
                $symboleCulture->setIdCulture(null);
            }
        }

        return $this;
    }
}
