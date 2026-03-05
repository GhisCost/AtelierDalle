<?php

namespace App\Controller\Admin;

use App\Entity\TexteEvenementCulture;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;


class TexteEvenementCultureCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return TexteEvenementCulture::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextareaField::new('contenu'),
            AssociationField::new('evenementCulture')
        ];
    }
    
}
