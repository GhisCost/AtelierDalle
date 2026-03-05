<?php

namespace App\Controller\Admin;

use App\Entity\TexteEvenementPlantes;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;


class TexteEvenementPlantesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return TexteEvenementPlantes::class;
    }
    
    public function configureFields(string $pageName): iterable
    {
        return [
            AssociationField::new('EvenementPlantes')
                ->setLabel('Evenement Plante'),
            TextareaField::new('contenu'),
        ];
    }
    
}
