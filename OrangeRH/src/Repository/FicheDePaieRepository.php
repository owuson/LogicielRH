<?php

namespace App\Repository;

use App\Entity\FicheDePaie;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method FicheDePaie|null find($id, $lockMode = null, $lockVersion = null)
 * @method FicheDePaie|null findOneBy(array $criteria, array $orderBy = null)
 * @method FicheDePaie[]    findAll()
 * @method FicheDePaie[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FicheDePaieRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FicheDePaie::class);
    }

    // /**
    //  * @return FicheDePaie[] Returns an array of FicheDePaie objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?FicheDePaie
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
