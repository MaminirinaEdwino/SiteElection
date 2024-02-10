<?php

namespace App\Repository;

use App\Entity\Elections;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Elections>
 *
 * @method Elections|null find($id, $lockMode = null, $lockVersion = null)
 * @method Elections|null findOneBy(array $criteria, array $orderBy = null)
 * @method Elections[]    findAll()
 * @method Elections[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ElectionsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Elections::class);
    }

//    /**
//     * @return Elections[] Returns an array of Elections objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('e.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Elections
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
