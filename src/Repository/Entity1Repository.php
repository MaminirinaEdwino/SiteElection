<?php

namespace App\Repository;

use App\Entity\Entity1;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Entity1>
 *
 * @method Entity1|null find($id, $lockMode = null, $lockVersion = null)
 * @method Entity1|null findOneBy(array $criteria, array $orderBy = null)
 * @method Entity1[]    findAll()
 * @method Entity1[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class Entity1Repository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Entity1::class);
    }

//    /**
//     * @return Entity1[] Returns an array of Entity1 objects
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

//    public function findOneBySomeField($value): ?Entity1
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
