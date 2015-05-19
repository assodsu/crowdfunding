<?php

namespace CF\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class RechercheController extends Controller
{
	public function searchAction(Request $request) 
	{
		$form = $this->createFormBuilder()
            ->add('recherche', 'text')
            ->getForm();
 
        if ($request->isMethod('POST'))
        {
            $form->bind($request);
 
            $motcles = $request->request->get($form->getName());
			$motcles = explode(' ', $motcles['recherche']);
     
	        $em = $this->getDoctrine()
	                   ->getEntityManager();

	        $resultats = array();

	        foreach ($motcles as $m) {
	        	if (strlen($m) > 3) {
	        		$resultats[] = $em->getRepository('CFMainBundle:Projet')
	                		->getSearchList($m);
	        	}
	        }

	        $recherche = array();
	        foreach ($resultats as $resultat) {
	        	foreach ($resultat as $r) {
	        		$recherche[] = $r;
	        	}
	        }

	        $recherche = array_unique($recherche);

			return $this->render('CFMainBundle:Project:showAll.html.twig', array
				(
					'projets' => $recherche,
					'recherche' => $request->request->get($form->getName())['recherche']
				)
			);
        }

		$all = $this->getDoctrine()->getRepository('CFMainBundle:Projet')->findAll();
        return $this->render('CFMainBundle:Project:showAll.html.twig',array('projets'=>$all,'categories'=>'All'));
	}

	public function renderSearchAction()
	{
		$form = $this->createFormBuilder()
            ->add('recherche', 'text')
            ->getForm();

        return $this->render('CFMainBundle:Recherche:search_form.html.twig', array
			(
				'form' => $form->createView()
			));
	}
}