<?php

namespace App\Repository;

use App\Entity\Electeurs;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Electeurs>
 *
 * @method Electeurs|null find($id, $lockMode = null, $lockVersion = null)
 * @method Electeurs|null findOneBy(array $criteria, array $orderBy = null)
 * @method Electeurs[]    findAll()
 * @method Electeurs[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ElecteursRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Electeurs::class);
    }

//    /**
//     * @return Electeurs[] Returns an array of Electeurs objects
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

//    public function findOneBySomeField($value): ?Electeurs
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
