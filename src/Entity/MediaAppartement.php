<?php

namespace App\Entity;

use App\Enum\Categorie;
use App\Repository\MediaAppartementRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Enum\Categorie;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

#[ORM\Entity(repositoryClass: MediaAppartementRepository::class)]
#[Vich\Uploadable]
class MediaAppartement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'mediaAppartements')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Appartement $appartement = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $contenu = null;

    #[Vich\UploadableField(mapping: 'media_appartement', fileNameProperty: 'contenu')]
    private ?File $file = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $updatedAt = null;

    #[ORM\Column(enumType: Categorie::class)]
    private ?Categorie $Categorie = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAppartement(): ?Appartement
    {
        return $this->appartement;
    }

    public function setAppartement(?Appartement $appartement): static
    {
        $this->appartement = $appartement;

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

     public function getCategorie(): ?Categorie
    {
        return $this->Categorie;
    }
 
    public function setCategorie(Categorie $Categorie): static
    {
        $this->Categorie = $Categorie;
 
        return $this;
    }
}