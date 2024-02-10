<?php

namespace App\Repository;

use App\Entity\NiveauElection;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<NiveauElection>
 *
 * @method NiveauElection|null find($id, $lockMode = null, $lockVersion = null)
 * @method NiveauElection|null findOneBy(array $criteria, array $orderBy = null)
 * @method NiveauElection[]    findAll()
 * @method NiveauElection[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NiveauElectionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, NiveauElection::class);
    }

//    /**
//     * @return NiveauElection[] Returns an array of NiveauElection objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('n')
//            ->andWhere('n.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('n.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?NiveauElection
//    {
//        return $this->createQueryBuilder('n')
//            ->andWhere('n.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
