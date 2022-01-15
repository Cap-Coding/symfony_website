<?php

namespace App\Controller\Admin;

use App\Entity\PricingPlan;
use App\Entity\PricingPlanBenefit;
use App\Entity\PricingPlanFeature;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        $url = $this->get(AdminUrlGenerator::class)
            ->setController(PricingPlanCrudController::class)
            ->generateUrl();

        return $this->redirect($url);
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Admin');
    }

    public function configureMenuItems(): iterable
    {
//        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
         yield MenuItem::linkToCrud('Pricing plan', 'fas fa-list', PricingPlan::class);
         yield MenuItem::linkToCrud('Pricing plan benefits', 'fas fa-list', PricingPlanBenefit::class);
         yield MenuItem::linkToCrud('Pricing plan features', 'fas fa-list', PricingPlanFeature::class);
    }
}
