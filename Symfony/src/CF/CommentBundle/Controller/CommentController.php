<?php

namespace CF\CommentBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

use CF\CommentBundle\Entity\Thread;
use CF\CommentBundle\Entity\Comment;
use CF\CommentBundle\Form\CommentType;

class CommentController extends Controller
{
    public function newAction(Thread $thread)
    {
    	$comment = new Comment();
        $form = $this->createForm(new CommentType(), $comment);

        return $this->render('CFCommentBundle:Comment:new.html.twig', array('form' => $form->createView(), 'thread' => $thread));
    }

    /**
	 * @ParamConverter("commentParent", class="CFCommentBundle:Comment", options={"id" = "comment_id"})
	 */
    public function replyAction(Thread $thread, Comment $commentParent)
    {
    	$comment = new Comment();
        $form = $this->createForm(new CommentType(), $comment);

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

    public function updateAction(Thread $thread)
    {
        $request = $this->get('request');
        $messageContent=$request->request->get('message');

        $comment = new Comment();

        $user = $this->container->get('security.context')->getToken()->getUser();

        $comment->setContent($messageContent);
        $comment->setThread($thread);
        $comment->setUser($user);

        $thread->setNbComment($thread->getNbComment()+1);

        $em = $this->getDoctrine()->getEntityManager();
        $em->persist($comment);

        $em->flush();

        $return=array("responseCode"=>200,  "message"=>$messageContent);

        $return=json_encode($return);
        return new Response($return,200,array('Content-Type'=>'application/json'));
    } 

    /**
     * @ParamConverter("commentParent", class="CFCommentBundle:Comment", options={"id" = "comment_id"})
     */
    public function replyUpdateAction(Thread $thread, Comment $commentParent)
    {
        $request = $this->get('request');
        $messageContent=$request->request->get('message');

        $comment = new Comment();

        $user = $this->container->get('security.context')->getToken()->getUser();

        $comment->setContent($messageContent);
        $comment->setThread($thread);
        $comment->setUser($user);
        $comment->setParent($commentParent);

        $thread->setNbComment($thread->getNbComment()+1);

        $em = $this->getDoctrine()->getEntityManager();
        $em->persist($comment);

        $em->flush();

        $return=array("responseCode"=>200,  "message"=>$messageContent);

        $return=json_encode($return);
        return new Response($return,200,array('Content-Type'=>'application/json'));
    }

    public function reportUpdateAction(Comment $comment)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $comment->setReport($comment->getReport()+1);

        $em->merge($comment);
        $em->flush();

        $return=array("responseCode"=>200,  "message"=>"OK");

        $return=json_encode($return);
        return new Response($return,200,array('Content-Type'=>'application/json'));
    }
}