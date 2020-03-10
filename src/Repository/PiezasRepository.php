<?php

namespace App\Repository;

use App\Constantes\EstadosConstantes;
use App\Entity\Piezas;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\ORM\Query;

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

    public function findOneBySomeField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.campo2 = :campo2')
            ->setParameter('campo2', $value->campo2)
            ->andWhere('p.estado = :estado')
            ->setParameter('estado', EstadosConstantes::ESTADO_PIEZA_PD)
            ->getQuery()
            ->getOneOrNullResult(Query::HYDRATE_ARRAY);
    }

    public function findAllLotes()
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.estado = :estado')
            ->setParameter('estado', EstadosConstantes::ESTADO_PIEZA_PD)
            ->groupby('p.estado')
            ->getQuery()
            ->getResult(Query::HYDRATE_ARRAY);
    }

    public function findPiezasXLote($lote)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.estado = :estado')
            ->setParameter('estado', EstadosConstantes::ESTADO_PIEZA_PD)
            ->andWhere('p.lote = :lote')
            ->setParameter('lote', $lote)
            ->getQuery()
            ->getResult(Query::HYDRATE_ARRAY);
    }
}
