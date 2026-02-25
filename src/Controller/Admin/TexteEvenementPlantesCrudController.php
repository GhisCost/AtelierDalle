<?php

namespace App\Controller\Admin;

use App\Entity\TexteEvenementPlantes;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class TexteEvenementPlantesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return TexteEvenementPlantes::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            AssociationField::new('id_evenement_plantes_id'),
            TextEditorField::new('contenu'),
        ];
    }
    
}
