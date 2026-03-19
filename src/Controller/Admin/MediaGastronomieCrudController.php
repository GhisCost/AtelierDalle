<?php

namespace App\Controller\Admin;

use App\Entity\MediaGastronomie;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Vich\UploaderBundle\Form\Type\VichFileType;

class MediaGastronomieCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return MediaGastronomie::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
       return[

        // Affiche le nom du fichier uniquement dans la liste
        TextField::new('lien_source', 'Fichier')
            ->onlyOnIndex(),

        // Champ d'upload pour le formulaire (new/edit)
        Field::new('file')
            ->setFormType(VichFileType::class)
            ->setLabel('Image ou Vidéo')
            ->setFormTypeOption('required', false)
            ->onlyOnForms(),

        AssociationField::new('gastronomie')
            ->setLabel('Gastronomie de la Dalle'),

    ];
    }
    
}
