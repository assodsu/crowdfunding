<?php

namespace CF\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class RechercheController extends Controller
{
	public function searchAction(Request $request) 
	{
		$selecteurs = $this->getDoctrine()->getRepository('CFMainBundle:Selecteur')->getSelecteursLesProjets();

		$form = $this->createFormBuilder()
            ->add('recherche', 'text', array('required' => false))
            ->add('tags', 'text', array('attr' => array('id' => 'tags-form-hidden'), 'required' => false))
            ->getForm();
 
        if ($request->isMethod('POST'))
        {
            $form->bind($request);

            $data = $request->request->get($form->getName());
            $nomProjet = $data['recherche'];
            $tags = explode(' ', $data['tags']);

            $em = $this->getDoctrine()
	                   ->getEntityManager();

	        $projetsByName = $em->getRepository('CFMainBundle:Projet')->getSearchNameList($nomProjet);

	        if(count($tags) > 0 && $tags[0] != "")
	        {
	        	$projetsByTags = array();
		        foreach ($tags as $key => $tag) {
		        	if (strlen($tag) > 2) {
		        		$projetsByTags[] = $em->getRepository('CFMainBundle:Projet')->getSearchTagsList($tag);
					}
				}

				$projetsByTagsTest = array();

				foreach ($projetsByTags as $resultat) {
					foreach ($resultat as $r) {
						$projetsByTagsTest[] = $r;
					}
				}

		        $projetsByTagsTest = array_unique($projetsByTagsTest);

				$results = array_intersect($projetsByName, $projetsByTagsTest);
	        }
	        else
	        {
	        	$results = $projetsByName;
	        }

	        $results = array_slice($results, 0, 5);

			return $this->render('CFMainBundle:Project:showAll.html.twig', array
				(
					'selecteurs' => $selecteurs,
					'projets' => $results,
					'rechercheName' => $request->request->get($form->getName())['recherche'],
					'rechercheTags' => $request->request->get($form->getName())['tags']
				)
			);

 			/*
            $motcles = $request->request->get($form->getName());
			$motcles = explode(' ', $motcles['recherche']);
     
	        $em = $this->getDoctrine()
	                   ->getEntityManager();

	        $resultats = array();
	        $resultats = $em->getRepository('CFMainBundle:Projet')->getValidateSearch(0,5,array_values($motcles)[0]);

	        foreach ($motcles as $key => $m) {
	        	if (strlen($m) > 2) {
	        		$resultats[] = array_intersect($resultats, $em->getRepository('CFMainBundle:Projet')->getValidateSearch(0,5,$m));
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
					'selecteurs' => $selecteurs,
					'projets' => $recherche,
					'recherche' => $request->request->get($form->getName())['recherche']
				)
			);*/
        }

		$all = $this->getDoctrine()->getRepository('CFMainBundle:Projet')->findAll();
        return $this->render('CFMainBundle:Project:showAll.html.twig',array('projets'=>$all,'categories'=>'All', 'selecteurs' => $selecteurs));
	}

    public function updateSearchAction()
    {
        $request = $this->get('request');
        $index = $request->request->get('index');
        $nomProjet = $request->request->get('recherche');
        $tags = explode(' ', $request->request->get('tags'));

        dump($index);

        $em = $this->getDoctrine()
                   ->getEntityManager();

        $projetsByName = $em->getRepository('CFMainBundle:Projet')->getSearchNameList($nomProjet);

        if(count($tags) > 0 && $tags[0] != "")
        {
        	$projetsByTags = array();
	        foreach ($tags as $key => $tag) {
	        	if (strlen($tag) > 2) {
	        		$projetsByTags[] = $em->getRepository('CFMainBundle:Projet')->getSearchTagsList($tag);
				}
			}

			$projetsByTagsTest = array();

			foreach ($projetsByTags as $resultat) {
				foreach ($resultat as $r) {
					$projetsByTagsTest[] = $r;
				}
			}

	        $projetsByTagsTest = array_unique($projetsByTagsTest);

			$results = array_intersect($projetsByName, $projetsByTagsTest);
        }
        else
        {
        	$results = $projetsByName;
        }

        $results = array_slice($results, $index, 5);

        return new JsonResponse($results);
    }

	public function renderSearchAction()
	{
		$form = $this->createFormBuilder()
            ->add('recherche', 'text', array('required' => false))
            ->add('tags', 'text', array('attr' => array('id' => 'tags-form-hidden'), 'required' => false))
            ->getForm();

        return $this->render('CFMainBundle:Recherche:search_form.html.twig', array
			(
				'form' => $form->createView()
			));
	}
}