<?php

namespace App\Controller\Admin;

use App\Entity\Appartement;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class AppartementCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Appartement::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [ 
            TextField::new('batiment'),
            IntegerField::new('etage'),
            TextField::new('escalier'),
            TextField::new('Numero')
        ];
    }    
}
