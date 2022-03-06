<?php

namespace App\Controller;

use App\Entity\Book;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class BookController extends AbstractController
{

    /**
     * @Route ("/books", name="app_books")
     */
    public function books()
    {
        $books = $this->getDoctrine()->getRepository(Book::class)->findAll();

        return $this->render('book/books.html.twig', ['books' => $books]);
    }
}