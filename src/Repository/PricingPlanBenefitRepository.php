<?php

namespace App\Repository;

use App\Entity\PricingPlanBenefit;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PricingPlanBenefit|null find($id, $lockMode = null, $lockVersion = null)
 * @method PricingPlanBenefit|null findOneBy(array $criteria, array $orderBy = null)
 * @method PricingPlanBenefit[]    findAll()
 * @method PricingPlanBenefit[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PricingPlanBenefitRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PricingPlanBenefit::class);
    }

    // /**
    //  * @return PricingPlanBenefit[] Returns an array of PricingPlanBenefit objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?PricingPlanBenefit
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
