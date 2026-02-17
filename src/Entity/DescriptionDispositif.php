<?php

namespace App\Entity;

use App\Repository\DescriptionDispositifRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DescriptionDispositifRepository::class)]
class DescriptionDispositif
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true)]
    private ?int $numeroDeChapitre = null;

    #[ORM\ManyToOne(inversedBy: 'descriptionDispositifs')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Dispositif $Id_Dispositif = null;

    #[ORM\Column(length: 255)]
    private ?string $contenu = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumeroDeChapitre(): ?int
    {
        return $this->numeroDeChapitre;
    }

    public function setNumeroDeChapitre(?int $numeroDeChapitre): static
    {
        $this->numeroDeChapitre = $numeroDeChapitre;

        return $this;
    }

    public function getIdDispositif(): ?Dispositif
    {
        return $this->Id_Dispositif;
    }

    public function setIdDispositif(?Dispositif $Id_Dispositif): static
    {
        $this->Id_Dispositif = $Id_Dispositif;

        return $this;
    }

    public function getContenu(): ?string
    {
        return $this->contenu;
    }

    public function setContenu(string $contenu): static
    {
        $this->contenu = $contenu;

        return $this;
    }
}
