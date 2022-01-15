<?php

namespace App\Controller;

use App\Entity\PricingPlan;
use App\Entity\PricingPlanFeature;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Config\Framework\Assets\PackageConfig;

class PricingController extends AbstractController
{
    #[Route('/pricing', name: 'pricing')]
    public function index(): Response
    {
        $pricingPlans = $this->getDoctrine()
            ->getRepository(PricingPlan::class)
            ->findBy([], ['id' => 'asc']);
        $features = $this->getDoctrine()
            ->getRepository(PricingPlanFeature::class)
            ->findAll();

        return $this->render('pricing/index.html.twig', [
            'pricing_plans' => $pricingPlans,
            'features' => $features,
        ]);
    }
}
