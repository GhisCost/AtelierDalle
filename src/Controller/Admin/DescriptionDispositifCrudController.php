<?php

namespace App\Controller\Admin;

use App\Entity\DescriptionDispositif;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class DescriptionDispositifCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return DescriptionDispositif::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            AssociationField::new('Dispositif'),
            TextareaField::new('contenu'),
            NumberField::new('numeroDeChapitre'),
        ];
    }
    
}
