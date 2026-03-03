<?php

namespace App\Entity;

use App\Repository\MediaDispositifRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

#[ORM\Entity(repositoryClass: MediaDispositifRepository::class)]
#[Vich\Uploadable]
class MediaDispositif
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'mediaDispositifs')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Dispositif $dispositif = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $contenu = null;

    #[Vich\UploadableField(mapping: 'media_dispositif', fileNameProperty: 'contenu')]
    private ?File $file = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $updatedAt = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDispositif(): ?Dispositif
    {
        return $this->dispositif;
    }

    public function setDispositif(?Dispositif $dispositif): static
    {
        $this->dispositif = $dispositif;

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