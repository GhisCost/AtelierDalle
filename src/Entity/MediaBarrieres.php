<?php

namespace App\Entity;

use App\Repository\MediaBarrieresRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

#[ORM\Entity(repositoryClass: MediaBarrieresRepository::class)]
#[Vich\Uploadable]
class MediaBarrieres
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'mediaBarrieres')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Barrieres $barrieres = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $lienSource = null;

    #[Vich\UploadableField(mapping: 'media_barrieres', fileNameProperty: 'lienSource')]
    private ?File $file = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $updatedAt = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBarrieres(): ?Barrieres
    {
        return $this->barrieres;
    }

    public function setBarrieres(?Barrieres $barrieres): static
    {
        $this->barrieres = $barrieres;

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