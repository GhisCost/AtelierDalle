<?php

namespace App\Controller\Admin;

use App\Entity\TextePortrait;
use EasyCorp\Bundle\EasyAdminBundle\Config\Assets;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class TextePortraitCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return TextePortrait::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextareaField::new('contenu'),
            AssociationField::new('portraitHabitant'),
            AssociationField::new('portraitNonHabitant')
        ];
    }

    
}
