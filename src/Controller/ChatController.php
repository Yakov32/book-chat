<?php

namespace App\Controller;

use App\Entity\Chat;
use App\Entity\Message;
use App\Entity\User;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ChatController extends AbstractController
{
    /**
     * @Route ("/chats", name="app_all_chats")
     */
    public function chats()
    {
        $user = $this->getUser();
        $chats = $user->getChats();

        if($chats[0] != null){
            return $this->render('chat/chats.html.twig', ['chats' => $chats, 'activeChat' => $chats[0]]);
        }

        return $this->render('chat/chats.html.twig');
    }

    /**
     * @Route ("/chat/{id}", name="app_chat_id")
     */
    public function chat($id, ManagerRegistry $doctrine)
    {
        $user = $this->getUser();
        $entityManager = $doctrine->getManager();
        $userRep = $entityManager->getRepository(User::class);
        $chatRep = $entityManager->getRepository(Chat::class);

        $chats = $user->getChats();
        $activeChat = $chatRep->find($id);

        $chatUsers = $userRep->findChatUsers(2);

        return $this->render('chat/chats.html.twig', ['chats' => $chats, 'activeChat' => $activeChat]);
    }

    /**
     * @Route ("chat/{chatId}/add-message", name="app_chat_add_message")
     */
    public function addMessage($chatId, Request $request, ManagerRegistry $doctrine)
    {
        $user = $this->getUser();
        $entityManager = $doctrine->getManager();
        $chatRep = $entityManager->getRepository(Chat::class);
        $chats = $user->getChats();
        $activeChat = $chatRep->find($chatId);
        $message = new Message();

        $message->setUser($user);
        $message->setChat($activeChat);
        $message->setText($request->request->get('chatMessage'));
        $message->setCreatedAt(new \DateTime());

        $em = $this->getDoctrine()->getManager();

        $entityManager->persist($message);
        $entityManager->flush();

        return $this->render('chat/chats.html.twig', ['chats' => $chats, 'activeChat' => $activeChat]);
    }
}