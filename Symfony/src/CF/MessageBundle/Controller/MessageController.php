<?php

namespace CF\MessageBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use CF\MessageBundle\Entity\Message;
use CF\MessageBundle\Form\MessageType;
use CF\MessageBundle\Entity\Conversation;
use CF\NotificationBundle\Entity\Notification;

class MessageController extends Controller
{
    public function addAction(Conversation $conversation)
    {
		$message = new Message();
        $form = $this->createForm(new MessageType(), $message);

        return $this->render('CFMessageBundle:Message:add.html.twig', array('form' => $form->createView(), 'conversation' => $conversation));
    }

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
        $notif->setContenu('Message de '.$fromUtilisateur);
        $notif->setUser($toUtilisateur);

        $em->persist($notif);
        $em->flush();
        
        $return=array("responseCode"=>200,  "message"=>$messageContent);

        $return=json_encode($return);
        return new Response($return,200,array('Content-Type'=>'application/json'));
    }
}
