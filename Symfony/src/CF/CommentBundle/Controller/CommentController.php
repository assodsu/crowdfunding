<?php

namespace CF\CommentBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

use CF\CommentBundle\Entity\Thread;
use CF\CommentBundle\Entity\Comment;
use CF\CommentBundle\Form\CommentType;

class CommentController extends Controller
{
    public function newAction(Request $request, Thread $thread)
    {
    	$comment = new Comment();
        $form = $this->createForm(new CommentType(), $comment);

        if($request->getMethod() == 'POST')
        {
            
            $form->bind($request);
            if($form->isValid())
            {
                $em = $this->getDoctrine()->getEntityManager();
                $comment = $form->getData();

            	$user = $this->container->get('security.context')->getToken()->getUser();
                $comment->setUser($user);

                $comment->setThread($thread);

                $thread->setNbComment($thread->getNbComment()+1);
                
                $em->persist($comment);
                $em->flush();

                $this->get('session')->getFlashBag()->add('info', 'Votre commentaire a été ajouté.');

                $projet = $thread->getProjet();
                
                return $this->redirect($this->generateUrl('cf_main_project', array('slug' => $projet->getSlug())));
            }
        }

        return $this->render('CFCommentBundle:Comment:new.html.twig', array('form' => $form->createView(), 'thread' => $thread));
    }

    /**
	 * @ParamConverter("commentParent", class="CFCommentBundle:Comment", options={"id" = "comment_id"})
	 */
    public function replyAction(Request $request, Thread $thread, Comment $commentParent)
    {
    	$comment = new Comment();
        $form = $this->createForm(new CommentType(), $comment);

        if($request->getMethod() == 'POST')
        {
            
            $form->bind($request);
            if($form->isValid())
            {
                $em = $this->getDoctrine()->getEntityManager();
                $comment = $form->getData();

            	$user = $this->container->get('security.context')->getToken()->getUser();
                $comment->setUser($user);

                $comment->setThread($thread);

                $comment->setParent($commentParent);

                $thread->setNbComment($thread->getNbComment()+1);
                
                $em->persist($comment);
                $em->flush();

                $this->get('session')->getFlashBag()->add('info', 'Votre commentaire a été ajouté.');

                $projet = $thread->getProjet();
                
                return $this->redirect($this->generateUrl('cf_main_project', array('slug' => $projet->getSlug())));
            }
        }

        return $this->render('CFCommentBundle:Comment:reply.html.twig', array('form' => $form->createView(), 'thread' => $thread, 'comment' => $commentParent));
    }

    /**
	 * @ParamConverter("comment", class="CFCommentBundle:Comment", options={"id" = "comment_id"})
	 */
    public function reportAction(Request $request, Thread $thread, Comment $comment)
    {
    	if($request->getMethod() == 'POST')
        {
            $em = $this->getDoctrine()->getEntityManager();

	    	$comment->setReport($comment->getReport()+1);

	    	$em->merge($comment);
	    	$em->flush();

	        $projet = $thread->getProjet();

	    	return $this->redirect($this->generateUrl('cf_main_project', array('slug' => $projet->getSlug())));
	    }

	     return $this->render('CFCommentBundle:Comment:report.html.twig', array('thread' => $thread, 'comment' => $comment));
    }
}
