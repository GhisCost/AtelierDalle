<?php

namespace App\Controller\Admin;

use App\Entity\PortraitNonHabitant;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class PortraitNonHabitantCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return PortraitNonHabitant::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('prenom'),
            TextField::new('role'),
        ];
    }

}
