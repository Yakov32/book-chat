<?php

namespace App\Controller;

use App\Entity\User;
use App\Type\LoginType;
use App\Type\RegistrationType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LoginController extends AbstractController
{

    /**
     * @Route("/login", name="app_login")
     */
    public function login(Request $request)
    {
        $user = new User();
        $form = $this->createForm(LoginType::class, $user, [
            'action' => $this->generateUrl('app_login'),
        ]);

        $form->handleRequest($request);



        return $this->render('auth/auth.html.twig', ['form' => $form->createView()]);

    }

}