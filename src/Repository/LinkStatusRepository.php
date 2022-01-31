<?php

namespace App\Repository;

use App\Entity\LinkStatus;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method LinkStatus|null find($id, $lockMode = null, $lockVersion = null)
 * @method LinkStatus|null findOneBy(array $criteria, array $orderBy = null)
 * @method LinkStatus[]    findAll()
 * @method LinkStatus[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LinkStatusRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LinkStatus::class);
    }

    // /**
    //  * @return LinkStatus[] Returns an array of LinkStatus objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?LinkStatus
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
