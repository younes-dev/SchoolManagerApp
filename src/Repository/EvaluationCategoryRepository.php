<?php

namespace App\Repository;

use App\Entity\EvaluationCategory;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method EvaluationCategory|null find($id, $lockMode = null, $lockVersion = null)
 * @method EvaluationCategory|null findOneBy(array $criteria, array $orderBy = null)
 * @method EvaluationCategory[]    findAll()
 * @method EvaluationCategory[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EvaluationCategoryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EvaluationCategory::class);
    }

    // /**
    //  * @return EvaluationCategory[] Returns an array of EvaluationCategory objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?EvaluationCategory
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
