<?php

namespace App\Entity;

use App\Repository\MediaGastronomieRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

#[ORM\Entity(repositoryClass: MediaGastronomieRepository::class)]
#[Vich\Uploadable]
class MediaGastronomie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'mediaGastronomies')]
    #[ORM\JoinColumn(nullable: false)]
    private ?GastronomieDalle $gastronomie = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $lienSource = null;

    #[Vich\UploadableField(mapping: 'media_gastronomie', fileNameProperty: 'lienSource')]
    private ?File $file = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $updatedAt = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGastronomie(): ?GastronomieDalle
    {
        return $this->gastronomie;
    }

    public function setGastronomie(?GastronomieDalle $gastronomie): static
    {
        $this->gastronomie = $gastronomie;

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