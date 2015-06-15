<?php

namespace CF\CommentBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

use CF\CommentBundle\Entity\Thread;
use CF\MainBundle\Entity\Projet;

class ThreadController extends Controller
{
    public function showAction(Projet $projet)
    {
    	$repository = $this
		  ->getDoctrine()
		  ->getManager()
		  ->getRepository('CFCommentBundle:Thread')
		;
		$thread = $repository->findOneBy(array('projet' => $projet));

        return $this->render('CFCommentBundle:Thread:show.html.twig', array('thread' => $thread));
    }
}
