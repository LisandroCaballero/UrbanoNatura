<?php

namespace App\Repository;

use App\Entity\TotalPiezas;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method TotalPiezas|null find($id, $lockMode = null, $lockVersion = null)
 * @method TotalPiezas|null findOneBy(array $criteria, array $orderBy = null)
 * @method TotalPiezas[]    findAll()
 * @method TotalPiezas[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TotalPiezasRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TotalPiezas::class);
    }

    // /**
    //  * @return TotalPiezas[] Returns an array of TotalPiezas objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TotalPiezas
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
