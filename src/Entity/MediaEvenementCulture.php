<?php

namespace App\Entity;

use App\Repository\MediaEvenementCultureRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

#[ORM\Entity(repositoryClass: MediaEvenementCultureRepository::class)]
#[Vich\Uploadable]
class MediaEvenementCulture
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'mediaEvenementCultures')]
    private ?EvenementCulture $evenementCulture = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $lienSource = null;

    #[Vich\UploadableField(mapping: 'media_evenement_culture', fileNameProperty: 'lienSource')]
    private ?File $file = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $updatedAt = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEvenementCulture(): ?EvenementCulture
    {
        return $this->evenementCulture;
    }

    public function setEvenementCulture(?EvenementCulture $evenementCulture): static
    {
        $this->evenementCulture = $evenementCulture;

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