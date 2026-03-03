<?php

namespace App\Entity;

use App\Repository\MediaBruitChantierRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

#[ORM\Entity(repositoryClass: MediaBruitChantierRepository::class)]
#[Vich\Uploadable]
class MediaBruitChantier
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'mediaBruitChantiers')]
    #[ORM\JoinColumn(nullable: false)]
    private ?BruitChantier $bruitChantier = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $lienSource = null;

    #[Vich\UploadableField(mapping: 'media_bruit_chantier', fileNameProperty: 'lienSource')]
    private ?File $file = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $updatedAt = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBruitChantier(): ?BruitChantier
    {
        return $this->bruitChantier;
    }

    public function setBruitChantier(?BruitChantier $bruitChantier): static
    {
        $this->bruitChantier = $bruitChantier;

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