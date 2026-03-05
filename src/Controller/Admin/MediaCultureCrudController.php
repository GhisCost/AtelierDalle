<?php

namespace App\Controller\Admin;

use App\Entity\MediaCulture;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Vich\UploaderBundle\Form\Type\VichFileType;

class MediaCultureCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return MediaCulture::class;
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

        AssociationField::new('cultureMonde')
            ->setLabel('Culture du Monde'),

        AssociationField::new('cultureUrbaine')
            ->setLabel('Culture Urbaine'),
    ];
    }
    
}
