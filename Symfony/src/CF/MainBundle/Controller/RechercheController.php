<?php

namespace CF\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class RechercheController extends Controller
{
	public function searchAction() 
	{
		$motcle = 'CRAB';
         
        $em = $this->getDoctrine()
                   ->getEntityManager();

        $recherche = $em->getRepository('CFMainBundle:Projet')
                		->getSearchList($motcle);

		return $this->render('CFMainBundle:Recherche:search.html.twig', array
			(
				'projets' => $recherche
			)
		);
	}
}