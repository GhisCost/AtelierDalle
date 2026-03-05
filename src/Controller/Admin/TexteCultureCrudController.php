<?php

namespace App\Controller\Admin;

use App\Entity\TexteCulture;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;


class TexteCultureCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return TexteCulture::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextareaField::new('contenu'),
            AssociationField::new('CultureMonde'),
            AssociationField::new('CultureUrbaine'),
        ];
    }
    
}
