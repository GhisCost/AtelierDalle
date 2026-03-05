<?php

namespace App\Controller\Admin;

use App\Entity\AteliersPlantes;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class AteliersPlantesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return AteliersPlantes::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            
            DateField::new('date'),
            TextareaField::new('resume'),
        ];
    }
    
}
