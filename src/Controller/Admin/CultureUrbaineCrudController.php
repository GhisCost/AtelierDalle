<?php

namespace App\Controller\Admin;

use App\Entity\CultureUrbaine;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class CultureUrbaineCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return CultureUrbaine::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
       return [
            TextField::new('nom'),
            TextareaField::new('description'),
        ];
    }
    
}
