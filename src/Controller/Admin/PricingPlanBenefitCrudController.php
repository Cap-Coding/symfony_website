<?php

namespace App\Controller\Admin;

use App\Entity\PricingPlanBenefit;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class PricingPlanBenefitCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return PricingPlanBenefit::class;
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
