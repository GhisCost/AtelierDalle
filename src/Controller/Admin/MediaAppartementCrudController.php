<?php

namespace App\Controller\Admin;

use App\Entity\MediaAppartement;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use App\Enum\Categorie;
use Vich\UploaderBundle\Form\Type\VichFileType;

class MediaAppartementCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return MediaAppartement::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
      return [
        // Affiche le nom du fichier uniquement dans la liste
        TextField::new('contenu', 'Fichier')
            ->onlyOnIndex(), 

        // Champ d'upload pour le formulaire (new/edit)
        Field::new('file')
            ->setFormType(VichFileType::class)
            ->setLabel('Image ou Vidéo')
            ->setFormTypeOption('required', false)
            ->onlyOnForms(),

        AssociationField::new('appartement')
            ->setLabel('Appartement'),

            ChoiceField::new('Categorie', 'Catégorie')
            ->setChoices(array_combine(array_map(fn(Categorie $c) => $c->value, Categorie::cases()),
            Categorie::cases()
            ))
            ->setRequired(true),
            
    ];
    }
    
}
