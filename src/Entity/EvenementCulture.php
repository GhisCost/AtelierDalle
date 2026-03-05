<?php

namespace App\Entity;

use App\Repository\EvenementCultureRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EvenementCultureRepository::class)]
class EvenementCulture
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Nom = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $dateDebut = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $DateFin = null;

    #[ORM\ManyToOne(inversedBy: 'evenementCultures')]
    private ?CultureDuMonde $CultureMonde = null;

    #[ORM\ManyToOne(inversedBy: 'evenementCultures')]
    private ?CultureUrbaine $CultureUrbaine = null;

    /**
     * @var Collection<int, TexteEvenementCulture>
     */
    #[ORM\OneToMany(targetEntity: TexteEvenementCulture::class, mappedBy: 'evenementCulture')]
    private Collection $texteEvenementCultures;

    /**
     * @var Collection<int, MediaEvenementCulture>
     */
    #[ORM\OneToMany(targetEntity: MediaEvenementCulture::class, mappedBy: 'EvenementCulture')]
    private Collection $mediaEvenementCultures;

    public function __construct()
    {
        $this->texteEvenementCultures = new ArrayCollection();
        $this->mediaEvenementCultures = new ArrayCollection();
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

    public function getDateDebut(): ?\DateTime
    {
        return $this->dateDebut;
    }

    public function setDateDebut(\DateTime $dateDebut): static
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    public function getDateFin(): ?\DateTime
    {
        return $this->DateFin;
    }

    public function setDateFin(\DateTime $DateFin): static
    {
        $this->DateFin = $DateFin;

        return $this;
    }

    public function getCultureMonde(): ?CultureDuMonde
    {
        return $this->CultureMonde;
    }

    public function setCultureMonde(?CultureDuMonde $CultureMonde): static
    {
        $this->CultureMonde = $CultureMonde;

        return $this;
    }

    public function getCultureUrbaine(): ?CultureUrbaine
    {
        return $this->CultureUrbaine;
    }

    public function setCultureUrbaine(?CultureUrbaine $CultureUrbaine): static
    {
        $this->CultureUrbaine = $CultureUrbaine;

        return $this;
    }

    /**
     * @return Collection<int, TexteEvenementCulture>
     */
    public function getTexteEvenementCultures(): Collection
    {
        return $this->texteEvenementCultures;
    }

    public function addTexteEvenementCulture(TexteEvenementCulture $texteEvenementCulture): static
    {
        if (!$this->texteEvenementCultures->contains($texteEvenementCulture)) {
            $this->texteEvenementCultures->add($texteEvenementCulture);
            $texteEvenementCulture->setEvenementCulture($this);
        }

        return $this;
    }

    public function removeTexteEvenementCulture(TexteEvenementCulture $texteEvenementCulture): static
    {
        if ($this->texteEvenementCultures->removeElement($texteEvenementCulture)) {
            // set the owning side to null (unless already changed)
            if ($texteEvenementCulture->getEvenementCulture() === $this) {
                $texteEvenementCulture->setEvenementCulture(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, MediaEvenementCulture>
     */
    public function getMediaEvenementCultures(): Collection
    {
        return $this->mediaEvenementCultures;
    }

    public function addMediaEvenementCulture(MediaEvenementCulture $mediaEvenementCulture): static
    {
        if (!$this->mediaEvenementCultures->contains($mediaEvenementCulture)) {
            $this->mediaEvenementCultures->add($mediaEvenementCulture);
            $mediaEvenementCulture->setEvenementCulture($this);
        }

        return $this;
    }

    public function removeMediaEvenementCulture(MediaEvenementCulture $mediaEvenementCulture): static
    {
        if ($this->mediaEvenementCultures->removeElement($mediaEvenementCulture)) {
            // set the owning side to null (unless already changed)
            if ($mediaEvenementCulture->getEvenementCulture() === $this) {
                $mediaEvenementCulture->setEvenementCulture(null);
            }
        }

        return $this;
    }
}
