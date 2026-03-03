<?php

namespace App\Entity;

use App\Repository\MediaCultureRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

#[ORM\Entity(repositoryClass: MediaCultureRepository::class)]
#[Vich\Uploadable]
class MediaCulture
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'mediaCultures')]
    private ?CultureDuMonde $cultureMonde = null;

    #[ORM\ManyToOne(inversedBy: 'mediaCultures')]
    private ?CultureUrbaine $cultureUrbaine = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $lienSource = null;

    #[Vich\UploadableField(mapping: 'media_culture', fileNameProperty: 'lienSource')]
    private ?File $file = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $updatedAt = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCultureMonde(): ?CultureDuMonde
    {
        return $this->cultureMonde;
    }

    public function setCultureMonde(?CultureDuMonde $cultureMonde): static
    {
        $this->cultureMonde = $cultureMonde;

        return $this;
    }

    public function getCultureUrbaine(): ?CultureUrbaine
    {
        return $this->cultureUrbaine;
    }

    public function setCultureUrbaine(?CultureUrbaine $cultureUrbaine): static
    {
        $this->cultureUrbaine = $cultureUrbaine;

        return $this;
    }

    public function getLienSource(): ?string
    {
        return $this->lienSource;
    }

    public function setLienSource(?string $lienSource): void
    {
        $this->lienSource = $lienSource;
    }

    public function setFile(?File $file = null): void
    {
        $this->file = $file;

        if ($file !== null) {
            $this->updatedAt = new \DateTimeImmutable();
        }
    }

    public function getFile(): ?File
    {
        return $this->file;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }
}