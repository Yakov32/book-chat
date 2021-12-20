<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Post;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;


class IndexController
{
    /**
     * @Route ("/", name="app_index")
     */
    public function index(Environment $twig, EntityManagerInterface $entityManager)
    {
        $categoryRep = $entityManager->getRepository(Category::class);
        $postRep     = $entityManager->getRepository(Post::class);

        $categories = $categoryRep->findAll();
        $posts = $postRep->findAll();


        /*$catAr = [];

        foreach ($categories as $category){
            if($category->getParent() != Null){
                $catAr[$category->getParent()->getName()][] = $category;
            }
        }
        */
        return new Response($twig->render('index/index.html.twig',
            ['categories' => $categories,
             'posts' => $posts]));
    }
}