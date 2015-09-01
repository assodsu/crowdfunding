<?php

namespace CF\MessageBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

use CF\MessageBundle\Entity\Message;
use CF\MessageBundle\Form\MessageType;
use CF\MessageBundle\Entity\Conversation;
use CF\NotificationBundle\Entity\Notification;

class MessageController extends Controller
{
    public function updateAction(Conversation $conversation)
    {
        $request = $this->get('request');
        $messageContent=$request->request->get('message');

        $message = new Message();

        $user = $this->container->get('security.context')->getToken()->getUser();

        $message->setContent($messageContent);
        $message->setConversation($conversation);
        $message->setUser($user);

        $em = $this->getDoctrine()->getEntityManager();
        $em->persist($message);

        foreach ($conversation->getUtilisateurs() as $u) {
            if ($this->getUser() != $u)
                $toUtilisateur = $u;
            else
                $fromUtilisateur = $u;
        }

        $message = \Swift_Message::newInstance()
            ->setSubject('Coceptio : Vous avez reçu un nouveau message !')
            ->setFrom('noreply@coceptio.fr')
            ->setTo($toUtilisateur->getEmail())
            ->setBody($this->renderView('CFMessageBundle:Message:email.txt.twig', array('u' => $toUtilisateur, 'u2' => $fromUtilisateur)))
        ;
        $this->get('mailer')->send($message);

        $notif = new Notification();
        $notif->setType(1);
        $notif->setContenu('Message de '.$fromUtilisateur->getNom());
        $notif->setUser($toUtilisateur);

        $em->persist($notif);
        $em->flush();
        
        $return=array("message"=>$messageContent);
        return new JsonResponse($return);
    }
}
