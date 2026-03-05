<?php

namespace App\Controller\Admin;

use App\Entity\MediaEvenementCulture;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Vich\UploaderBundle\Form\Type\VichFileType;

class MediaEvenementCultureCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return MediaEvenementCulture::class;
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

        AssociationField::new('evenementCulture')
            ->setLabel('Evenement Culture'),

    
    ];

    }
    
}
