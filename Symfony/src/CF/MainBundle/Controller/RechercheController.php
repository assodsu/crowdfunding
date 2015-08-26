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

	        $em = $this->getDoctrine()->getEntityManager();

	        $projetsByName = $em->getRepository('CFMainBundle:Projet')->getSearchNameList($nomProjet);

			if($data['tags'])
	        {
	        	$tags = explode(' ', $data['tags']);

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
					'rechercheName' => $data['recherche'],
					'rechercheTags' => $data['tags']
				)
			);
        }

		$all = $this->getDoctrine()->getRepository('CFMainBundle:Projet')->findAll();
        return $this->render('CFMainBundle:Project:showAll.html.twig',array('projets'=>$all,'categories'=>'All', 'selecteurs' => $selecteurs));
	}

    public function updateSearchAction()
    {
        $request = $this->get('request');
        $index = $request->request->get('index');
        $nomProjet = $request->request->get('search');

        $em = $this->getDoctrine()->getEntityManager();

        $projetsByName = $em->getRepository('CFMainBundle:Projet')->getSearchNameList($nomProjet);

		if($request->request->get('tags'))
        {
        	$tags = explode(' ', $request->request->get('tags'));

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