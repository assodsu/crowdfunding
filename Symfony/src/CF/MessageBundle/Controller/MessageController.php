<?php

namespace CF\MessageBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use CF\MessageBundle\Entity\Message;
use CF\MessageBundle\Form\MessageType;
use CF\MessageBundle\Entity\Conversation;

class MessageController extends Controller
{
    public function addAction(Request $request, $idConversation)
    {
		$message = new Message();
        $form = $this->createForm(new MessageType(), $message);

        $conversation = $this->getDoctrine()->getRepository('CFMessageBundle:Conversation')->findOneById($idConversation);

        if($request->getMethod() == 'POST')
        {
            $form->bind($request);

            $message->setConversation($conversation);

            if($form->isValid())
            {
                $em = $this->getDoctrine()->getEntityManager();
                $message = $form->getData();

                $em->persist($message);
                $em->flush();
                
                return $this->redirect($this->generateUrl('fos_user_profile_messages'));
            }
        }

        return $this->render('CFMessageBundle:Message:add.html.twig', array('form' => $form->createView(), 'conversation' => $conversation));
    }
}
