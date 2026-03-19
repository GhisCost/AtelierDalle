<?php

namespace App\Controller\Admin;

use App\Entity\TexteGastronomie;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class TexteGastronomieCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return TexteGastronomie::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            AssociationField::new('gastronomie'),
            TextField::new('categorie'),
            TextareaField::new('contenu'),
        ];
    }
    
}
