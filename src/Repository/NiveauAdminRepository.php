<?php

namespace App\Repository;

use App\Entity\NiveauAdmin;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<NiveauAdmin>
 *
 * @method NiveauAdmin|null find($id, $lockMode = null, $lockVersion = null)
 * @method NiveauAdmin|null findOneBy(array $criteria, array $orderBy = null)
 * @method NiveauAdmin[]    findAll()
 * @method NiveauAdmin[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NiveauAdminRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, NiveauAdmin::class);
    }

//    /**
//     * @return NiveauAdmin[] Returns an array of NiveauAdmin objects
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

//    public function findOneBySomeField($value): ?NiveauAdmin
//    {
//        return $this->createQueryBuilder('n')
//            ->andWhere('n.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
