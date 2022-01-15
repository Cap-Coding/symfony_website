<?php

namespace App\Controller\Admin;

use App\Entity\PricingPlan;
use App\Form\PricingPlanBenefitType;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class PricingPlanCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return PricingPlan::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name'),
            IntegerField::new('price'),
            CollectionField::new('benefits')
                ->setEntryType(PricingPlanBenefitType::class)
                ->onlyOnForms()
        ];
    }
}
