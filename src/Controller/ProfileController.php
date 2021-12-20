<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProfileController extends AbstractController
{
    /**
     * @Route ("/profile", name="app_user_profile")
     */
    public function getProfile()
    {
        return $this->render('profile/profile.html.twig');
    }

    /**
     * @Route ("/edit-profile", name="app_user_edit_profile")
     */
    public function editProfile()
    {
        return $this->render('profile/profile-edit.html.twig');
    }
}