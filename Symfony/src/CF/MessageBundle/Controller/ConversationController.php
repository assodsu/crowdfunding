<?php

namespace CF\MessageBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use CF\MessageBundle\Entity\Message;
use CF\MessageBundle\Form\MessageType;

class ConversationController extends Controller
{
    public function listAction()
    {
		$user = $this->get('security.context')->getToken()->getUser();

    	$conversations = $this->getDoctrine()->getRepository('CFMessageBundle:Conversation')->getUserActu($user);

        return $this->render('CFMessageBundle:Conversation:index.html.twig', array('conversations' => $conversations));
    }

    public function showAction($id)
    {
    	$conversation = $this->getDoctrine()->getRepository('CFMessageBundle:Conversation')->findOneById($id);

        $message = new Message();
        $form = $this->createForm(new MessageType(), $message);

        return $this->render('CFMessageBundle:Conversation:show.html.twig', array('form' => $form->createView(), 'conversation' => $conversation));
    }
}
