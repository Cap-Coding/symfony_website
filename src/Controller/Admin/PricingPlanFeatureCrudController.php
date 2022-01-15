<?php

namespace App\Controller\Admin;

use App\Entity\PricingPlanFeature;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class PricingPlanFeatureCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return PricingPlanFeature::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
