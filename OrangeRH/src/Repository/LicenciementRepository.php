<?php

namespace App\Repository;

use App\Entity\Licenciement;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Licenciement|null find($id, $lockMode = null, $lockVersion = null)
 * @method Licenciement|null findOneBy(array $criteria, array $orderBy = null)
 * @method Licenciement[]    findAll()
 * @method Licenciement[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LicenciementRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Licenciement::class);
    }

    // /**
    //  * @return Licenciement[] Returns an array of Licenciement objects
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
    public function findOneBySomeField($value): ?Licenciement
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
