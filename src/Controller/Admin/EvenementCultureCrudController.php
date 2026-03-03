<?php

namespace App\Controller\Admin;

use App\Entity\EvenementCulture;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class EvenementCultureCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return EvenementCulture::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [   
            TextField::new('nom'),
            DateField::new('date_debut'),
            DateField::new('date_fin'),
            AssociationField::new('Id_CultureMonde')
                ->setLabel('Culture du monde'),
            AssociationField::new('Id_CultureUrbaine')
                ->setLabel('Culture Urbaine'),
        ];
    }
    
}
