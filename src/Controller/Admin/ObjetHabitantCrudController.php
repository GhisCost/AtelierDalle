<?php

namespace App\Controller\Admin;

use App\Entity\ObjetHabitant;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ObjetHabitantCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ObjetHabitant::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('nom'),
            TextareaField::new('description'),
            AssociationField::new('habitant')
                ->setLabel('Habitant'),
        ];
    }
    
}
