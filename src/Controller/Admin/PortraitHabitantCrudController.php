<?php

namespace App\Controller\Admin;

use App\Entity\PortraitHabitant;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class PortraitHabitantCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return PortraitHabitant::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('prenom'),
            TextField::new('batiment'),
            TextField::new('culture')
        ];
    }
    
}
