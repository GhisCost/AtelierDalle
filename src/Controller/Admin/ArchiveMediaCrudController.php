<?php

namespace App\Controller\Admin;

use App\Entity\ArchiveMedia;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Vich\UploaderBundle\Form\Type\VichFileType;

class ArchiveMediaCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ArchiveMedia::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [

        TextField::new('nom'),

        TextareaField::new('description'),

        TextField::new('date'),
        
        TextField::new('categorie'),

    // Affiche le nom du fichier uniquement dans la liste
        TextField::new('contenu', 'Fichier')
            ->onlyOnIndex(), 

    // Champ d'upload pour le formulaire (new/edit)
        Field::new('file')
            ->setFormType(VichFileType::class)
            ->setLabel('Image ou Vidéo')
            ->setFormTypeOption('required', false)
            ->onlyOnForms(),

       
        ];
    }
    
}
