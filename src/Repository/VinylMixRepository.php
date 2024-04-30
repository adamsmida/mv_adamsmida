<?php

namespace App\Repository;

use App\Entity\VinylMix;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @extends ServiceEntityRepository<VinylMix>
 *
 * @method VinylMix|null find($id, $lockMode = null, $lockVersion = null)
 * @method VinylMix|null findOneBy(array $criteria, array $orderBy = null)
 * @method VinylMix[]    findAll()
 * @method VinylMix[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VinylMixRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, VinylMix::class);
    }
    private function addOrderByVotesQueryBuilder(QueryBuilder $queryBuilder = null): QueryBuilder
    {
        $queryBuilder = $queryBuilder ?? $this->createQueryBuilder('mix');
        return $queryBuilder->orderBy('mix.votes', 'DESC');
    }

        /**
         * @return VinylMix[] Returns an array of VinylMix objects
         */
       public function findAllOrderedByVotes(string $genre = null): array
        {
            $queryBuilder = $this->addOrderByVotesQueryBuilder();
            if ($genre) {
                $queryBuilder->andWhere('mix.genre = :genre')
                    ->setParameter('genre', $genre);
            }
            return $queryBuilder
                ->getQuery()
                ->getResult()
         ;
      }
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('v')
    //            ->andWhere('v.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('v.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

      //  public function findOneBySomeField($value): ?VinylMix
       // {
        //    return $this->createQueryBuilder('v')
          //      ->andWhere('v.exampleField = :val')
      //          ->setParameter('val', $value)
       //         ->getQuery()
       //         ->getOneOrNullResult()
      //      ;
  //      }
}
