<?php

namespace CF\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PageController extends Controller
{
    public function indexAction()
    {
    	$projets = $this->getDoctrine()->getRepository('CFMainBundle:Projet')->findAll();

        return $this->render('CFMainBundle:Page:index.html.twig', array('projets'=>$projets));
    }
}
