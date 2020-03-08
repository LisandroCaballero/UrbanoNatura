<?php

namespace App\Repository;

use App\Entity\Piezas;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Piezas|null find($id, $lockMode = null, $lockVersion = null)
 * @method Piezas|null findOneBy(array $criteria, array $orderBy = null)
 * @method Piezas[]    findAll()
 * @method Piezas[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PiezasRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Piezas::class);
    }

    public function findOneBySomeField($value): ?Piezas
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.campo2 = :campo2')
            ->setParameter('campo2', $value->campo2)
            ->andWhere('p.estado = :estado')
            ->setParameter('estado', 'PD')
            ->getQuery()
            ->getOneOrNullResult();
    }
}
