<?php

namespace App\Controller\Admin;

use App\Entity\TexteGastronomie;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;

class TexteGastronomieCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return TexteGastronomie::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            AssociationField::new('Gastronomie'),
            TextareaField::new('contenu'),
        ];
    }
    
}
