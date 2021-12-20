<?php

namespace App\Controller;

use App\Entity\User;
use App\Type\RegistrationType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Twig\Environment;


class RegistrationController
{
    public function __construct(EntityManagerInterface $entityManager, ValidatorInterface $validator)
    {
        $this->entityManager = $entityManager;
        $this->validator = $validator;
    }
    /**
     * @Route ("/registration")
     */
    public function registration(Request $request, FormFactoryInterface $formFactory, Environment $twig, UserPasswordHasherInterface $hasher)
    {
        $user = new User();
        $form = $formFactory->create(RegistrationType::class, $user);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user = $form->getData();
            $user->setPassword($hasher->hashPassword($user, $user->getPassword()));
            $this->entityManager->persist($user);
            $this->entityManager->flush();
        }

        $content = $twig->render('registration/registration.html.twig', ['form' => $form->createView()]);
        return new Response($content);

    }
}