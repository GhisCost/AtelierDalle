<?php

namespace App\Controller\Admin;

use App\Entity\GastronomieDalle;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class GastronomieDalleCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return GastronomieDalle::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('nom'),
            AssociationField::new('cultureMonde')
                ->setLabel('Culture du Monde'),
        ];
    }
    
}
