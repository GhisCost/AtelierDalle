<?php

namespace App\Repository;

use App\Entity\PortraitHabitant;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<PortraitHabitant>
 */
class PortraitHabitantRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PortraitHabitant::class);
    }

    public function findAllPortraits(): array
    {
        return $this->createQueryBuilder('p')
            ->leftJoin('p.mediaPortraits', 'm')
            ->addSelect('m')
            ->leftJoin('p.textePortraits', 't')
            ->addSelect('t')
            ->leftJoin('p.objetHabitants', 'o')
            ->addSelect('o')
            ->getQuery()
            ->getResult();
    }
}


//    /**
//     * @return PortraitHabitant[] Returns an array of PortraitHabitant objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('p.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?PortraitHabitant
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }