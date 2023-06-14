<?php

namespace App\Repository;

use App\Entity\Seismes;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\EntityManagerInterface;

/**
 * @extends ServiceEntityRepository<Seismes>
 *
 * @method Seismes|null find($id, $lockMode = null, $lockVersion = null)
 * @method Seismes|null findOneBy(array $criteria, array $orderBy = null)
 * @method Seismes[]    findAll()
 * @method Seismes[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */

class SeismesRepository extends ServiceEntityRepository
{

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Seismes::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(Seismes $entity, bool $flush = true): void
    {
        $this->_em->persist($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function remove(Seismes $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }



    public function getPays(){
        $entityManager = $this->getEntityManager();

        $listPays = $entityManager
            ->createQueryBuilder('s')
            ->select('s.pays')
            ->from(Seismes::class, 's')
            ->groupBy('s.pays')
            ->getQuery()
            ->getResult();

        return $listPays;
    }

    public function getExtremum(){
        $entityManager = $this->getEntityManager();
        $listExtremum = $entityManager
            ->createQueryBuilder('s')
            ->select('s.pays, MIN(s.mag) as min_mag, MAX(s.mag) as max_mag, AVG(s.mag) as avg_mag')
            ->from(Seismes::class, 's')
            ->groupBy('s.pays')
            ->getQuery()
            ->getResult();

        return $listExtremum;
    }

    public function getSeisme($pays, $intensite){
        $entityManager = $this->getEntityManager();
        $queryBuilder = $entityManager->createQueryBuilder('s');
        $queryBuilder->select('s')
            ->from(Seismes::class, 's')
            ->setMaxResults(50);


        if($pays != 'tous'){
            $queryBuilder->where('s.pays = :pays')
                ->setParameter('pays',$pays);
        }
        if($intensite != 'tous'){
            if($pays != 'tous'){
                $queryBuilder->andWhere('s.mag <= :intensite')
                    ->setParameter('intensite',$intensite);
            }else{
                $queryBuilder->where('s.mag <= :intensite')
                    ->setParameter('intensite',$intensite);
            }
        }

        $query = $queryBuilder->getQuery();
        $seismes =$query->execute();

        return $seismes;
    }

    // /**
    //  * @return Seismes[] Returns an array of Seismes objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Seismes
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
