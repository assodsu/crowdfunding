<?php

namespace CF\MessageBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MessageController extends Controller
{
    public function addAction()
    {
        return $this->render('CFMessageBundle:Message:add.html.twig');
    }
}
