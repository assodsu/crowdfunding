<?php

namespace CF\MessageBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use CF\MessageBundle\Entity\Message;
use CF\MessageBundle\Form\MessageType;
use CF\MessageBundle\Entity\Conversation;

class MessageController extends Controller
{
    public function addAction(Request $request, Conversation $conversation)
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
        $em->flush();
        
        $return=array("responseCode"=>200,  "message"=>$messageContent);

        $return=json_encode($return);
        return new Response($return,200,array('Content-Type'=>'application/json'));
    }
}
