<?php

namespace CF\CommentBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use CF\CommentBundle\Entity\Thread;

class ThreadController extends Controller
{
    public function showAction(Thread $thread)
    {
        return $this->render('CFCommentBundle:Thread:show.html.twig', array('thread' => $thread));
    }
}
