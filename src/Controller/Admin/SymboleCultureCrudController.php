<?php

namespace App\Controller\Admin;

use App\Entity\SymboleCulture;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Vich\UploaderBundle\Form\Type\VichFileType;

class SymboleCultureCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return SymboleCulture::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
        
        TextField::new('nom'),
        AssociationField::new('Culture'),
        TextField::new('image', 'Fichier')
            ->onlyOnIndex(), 
        Field::new('imageFile')
            ->setFormType(VichFileType::class)
            ->setLabel('Image')
            ->setFormTypeOption('required', false)
            ->onlyOnForms(),
        TextareaField::new('description'),
        ];
    }
    
}
