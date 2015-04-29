<?php

namespace CF\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PageController extends Controller
{
    public function indexAction()
    {
    	$projets = $this->getDoctrine()->getRepository('CFMainBundle:Projet')->findAll();
    	$projetsAccueil = $this->getDoctrine()->getRepository('CFMainBundle:ProjetAccueil')->findAll();

        return $this->render('CFMainBundle:Page:index.html.twig', 
        	array(
        		'projets' => $projets,
        		'projetsAccueil' => $projetsAccueil
        		)
        	);
    }

    public function contactAction()
    {
    	return $this->render('CFMainBundle:Page:contact.html.twig');
    }
}
