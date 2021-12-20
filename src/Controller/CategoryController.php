<?php

namespace App\Controller;

use App\Entity\Category;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController extends AbstractController
{
    /**
     * @Route ("/category{category}")
     */
    public function index(Request $request, $category, EntityManagerInterface $entityManager)
    {
        $catRepository = $entityManager->getRepository(Category::class);
    }
}