<?php

namespace CF\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use CF\MainBundle\Entity\InscriptionBeggin;
use Symfony\Component\HttpFoundation\Request;

class InscController extends Controller
{
	/*indexAction -> determination du type d'utilisateur*/	
	public function indexAction(){

    	//retour de la vue et création de la vue du formulaire par la methode createView()
        return $this->render('CFMainBundle:Inscription:inscriptionIndex.html.twig');

	}

	/*assoAction -> l'utilisateur est une association*/
	public function assoAction(){

		return $this->render('CFMainBundle:Inscription:inscriptionAsso.html.twig');

	}

	/*entrAction -> l'utilisateur est une entreprise*/
	public function entrAction(){

		return $this->render('CFMainBundle:Inscription:inscriptionEntr.html.twig');
	}


	/*partAction -> l'utilisateur est une entreprise*/
	public function partAction(){

		return $this->render('CFMainBundle:Inscription:inscriptionPart.html.twig');
	}


}