<?php

namespace App\Repository;

use App\Entity\Book;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class BookRepository extends  ServiceEntityRepository
{
    /**
     * @method Book|null find($id, $lockMode = null, $lockVersion = null)
     * @method Book|null findOneBy(array $criteria, array $orderBy = null)
     * @method Book[]    findAll()
     * @method Book[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
     */
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Book::class);
    }
}