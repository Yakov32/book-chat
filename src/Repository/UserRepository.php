<?php

namespace App\Repository;

use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;


/**
 * @method User|null find($id, $lockMode = null, $lockVersion = null)
 * @method User|null findOneBy(array $criteria, array $orderBy = null)
 * @method User[]    findAll()
 * @method User[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserRepository extends  ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, User::class);
    }

    /*public function findProductsByCategoryRoute(string $categoryRoute)
    {
        return $this->createQueryBuilder('p')
            ->innerJoin('p.category' , 'cat')
            ->where("cat.route = :route")
            ->setParameter('route', $categoryRoute)
            ->getQuery()
            ->execute();
    }

    public function findByQueryName($name)
    {
        return $this->createQueryBuilder('p')
            ->where('p.name LIKE :name')
            ->setParameter('name', '%'.$name. '%')
            ->getQuery()
            ->execute();
    }*/

    public function findChatUsers($id){
        return $this->createQueryBuilder('u')
            ->where(':chat MEMBER OF u.chats')
            ->setParameter('chat', $id)
            ->getQuery()
            ->getResult();
    }
}