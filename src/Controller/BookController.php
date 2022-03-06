<?php

namespace App\Controller;

use App\Entity\Book;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class BookController extends AbstractController
{

    /**
     * @Route ("/books", name="app_books")
     */
    public function books(ManagerRegistry $doctrine)
    {
        $entityManager = $doctrine->getManager();

        $books = $entityManager->getRepository(Book::class)->findAll();

        return $this->render('book/books.html.twig', ['books' => $books]);
    }
}