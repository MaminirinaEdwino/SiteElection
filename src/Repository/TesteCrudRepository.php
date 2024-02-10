<?php

namespace App\Repository;

use App\Entity\TesteCrud;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<TesteCrud>
 *
 * @method TesteCrud|null find($id, $lockMode = null, $lockVersion = null)
 * @method TesteCrud|null findOneBy(array $criteria, array $orderBy = null)
 * @method TesteCrud[]    findAll()
 * @method TesteCrud[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TesteCrudRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TesteCrud::class);
    }

//    /**
//     * @return TesteCrud[] Returns an array of TesteCrud objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('t.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?TesteCrud
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
