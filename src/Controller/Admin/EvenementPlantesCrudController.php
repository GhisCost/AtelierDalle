<?php

namespace App\Controller\Admin;

use App\Entity\EvenementPlantes;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class EvenementPlantesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return EvenementPlantes::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [   
            TextField::new('nom'),
            DateField::new('date'),
            TextareaField::new('resume')
        ];
    }
    
}
