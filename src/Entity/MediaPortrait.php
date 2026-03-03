<?php

namespace App\Entity;

use App\Repository\MediaPortraitRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

#[ORM\Entity(repositoryClass: MediaPortraitRepository::class)]
#[Vich\Uploadable]
class MediaPortrait
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'mediaPortraits')]
    private ?PortraitHabitant $portraitHabitant = null;

    #[ORM\ManyToOne(inversedBy: 'mediaPortraits')]
    private ?PortraitNonHabitant $portraitNonHabitant = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $contenu = null;

    #[Vich\UploadableField(mapping: 'media_portrait', fileNameProperty: 'contenu')]
    private ?File $file = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $updatedAt = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPortraitHabitant(): ?PortraitHabitant
    {
        return $this->portraitHabitant;
    }

    public function setPortraitHabitant(?PortraitHabitant $portraitHabitant): static
    {
        $this->portraitHabitant = $portraitHabitant;
        return $this;
    }

    public function getPortraitNonHabitant(): ?PortraitNonHabitant
    {
        return $this->portraitNonHabitant;
    }

    public function setPortraitNonHabitant(?PortraitNonHabitant $portraitNonHabitant): static
    {
        $this->portraitNonHabitant = $portraitNonHabitant;
        return $this;
    }

    public function getContenu(): ?string
    {
        return $this->contenu;
    }

    public function setContenu(?string $contenu): void
    {
        $this->contenu = $contenu;
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