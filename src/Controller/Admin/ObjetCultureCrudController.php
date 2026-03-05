<?php

namespace App\Controller\Admin;

use App\Entity\ObjetCulture;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ObjetCultureCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ObjetCulture::class;
    }

   
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('nom'),
            TextareaField::new('description'),
            AssociationField::new('Culture'),
        ];
    }
    
}
