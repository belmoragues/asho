<?php

namespace App\Repository;

use App\Entity\Passenger;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Passenger>
 *
 * @method Passenger|null find($id, $lockMode = null, $lockVersion = null)
 * @method Passenger|null findOneBy(array $criteria, array $orderBy = null)
 * @method Passenger[]    findAll()
 * @method Passenger[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PassengerRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Passenger::class);
    }

    public function save(Passenger $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Passenger $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function fetchGenderData(): array
    {

        $male = $this->createQueryBuilder('p')
        ->select('count(p.id)')
        ->andWhere('p.sex = :sex')->setParameter('sex', 'male')
        ->getQuery()
        ->getScalarResult();

        $female = $this->createQueryBuilder('p')
        ->select('count(p.id)')
        ->andWhere('p.sex = :sex')->setParameter('sex', 'female')
        ->getQuery()
        ->getScalarResult();


       return ['female' => $female[0][1], 'male' => $male[0][1]];
   }

   public function fetchPassengers(): array
    {

        $passengers = $this->createQueryBuilder('p')
        ->select('count(p.id)')
        ->getQuery()
        ->getScalarResult();



       return ['total' => $passengers[0][1]];
   }

   public function fetchSurvivors(): array
   {

       $survivors = $this->createQueryBuilder('p')
       ->select('count(p.id)')
       ->andWhere('p.survived = :survived')->setParameter('survived', 1)
       ->getQuery()
       ->getScalarResult();



      return ['total' => $survivors[0][1]];
  }

  public function fetchSurvivorsByGender(): array
   {

       $survivorsMale = $this->createQueryBuilder('p')
       ->select('count(p.id)')
       ->andWhere('p.survived = :survived')->setParameter('survived', 1)
       ->andWhere('p.sex = :sex')->setParameter('sex', 'male')
       ->getQuery()
       ->getScalarResult();

       $survivorsFemale = $this->createQueryBuilder('p')
       ->select('count(p.id)')
       ->andWhere('p.survived = :survived')->setParameter('survived', 1)
       ->andWhere('p.sex = :sex')->setParameter('sex', 'female')
       ->getQuery()
       ->getScalarResult();



      return ['data' => [$survivorsMale[0][1], $survivorsFemale[0][1]]];
  }

//    /**
//     * @return Passenger[] Returns an array of Passenger objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('p.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Passenger
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
