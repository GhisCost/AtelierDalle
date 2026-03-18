<?php

namespace App\Repository;

use App\Entity\ObjetHabitant;
use App\Entity\PortraitHabitant;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ObjetHabitant>
 */
class ObjetHabitantRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ObjetHabitant::class);
    }

  /**
     * Trouve tous les objets liés à un PortraitHabitant donné.
     *
     * @param PortraitHabitant $portraitHabitant
     * @return ObjetHabitant[]
     */

    public function findByPortraitHabitant(PortraitHabitant $portraitHabitant): array
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.habitant = :habitant')
            ->setParameter('habitant', $portraitHabitant)
            ->orderBy('o.nom', 'ASC')
            ->getQuery()
            ->getResult();
    } 
}


   //    /**
    //     * @return ObjetHabitant[] Returns an array of ObjetHabitant objects
    // //     */
    //    public function findObjetByHabitant($value): array
    //    {
    //        return $this->createQueryBuilder('o')
    //            ->andWhere('o.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('o.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?ObjetHabitant
    //    {
    //        return $this->createQueryBuilder('o')
    //            ->andWhere('o.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }