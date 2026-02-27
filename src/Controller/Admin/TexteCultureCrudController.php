<?php

namespace App\Controller\Admin;

use App\Entity\TexteCulture;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
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
            IdField::new('id'),
            TextareaField::new('contenu'),
            AssociationField::new('id_culture_monde_id'),
            AssociationField::new('id_culture_urbaine_id'),
        ];
    }
    
}
