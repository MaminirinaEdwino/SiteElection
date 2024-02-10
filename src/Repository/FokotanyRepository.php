<?php

namespace App\Repository;

use App\Entity\Fokotany;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Fokotany>
 *
 * @method Fokotany|null find($id, $lockMode = null, $lockVersion = null)
 * @method Fokotany|null findOneBy(array $criteria, array $orderBy = null)
 * @method Fokotany[]    findAll()
 * @method Fokotany[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FokotanyRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Fokotany::class);
    }

//    /**
//     * @return Fokotany[] Returns an array of Fokotany objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('f')
//            ->andWhere('f.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('f.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Fokotany
//    {
//        return $this->createQueryBuilder('f')
//            ->andWhere('f.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
