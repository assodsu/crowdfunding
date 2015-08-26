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
            ->add('type', 'choice', array('choices'   => array('association' => 'associations', 'projet' => 'projets'),'data' => 'projet'))
            ->getForm();
 
        if ($request->isMethod('POST'))
        {
            $form->bind($request);

            $data = $request->request->get($form->getName());
            $nom = $data['recherche'];
	        $em = $this->getDoctrine()->getEntityManager();

            if($data['type'] == 'projet')
            {
				$projetsByName = $em->getRepository('CFMainBundle:Projet')->getSearchNameList($nom);

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
            }
            else if($data['type'] == 'association')
            {
            	$assosByName = $em->getRepository('CFUserBundle:Association')->getSearchNameList($nom);

		        if($data['tags'])
		        {
		        	$tags = explode(' ', $data['tags']);

		        	$assosByTags = array();
			        foreach ($tags as $key => $tag) {
			        	if (strlen($tag) > 2) {
			        		$assosByTags[] = $em->getRepository('CFUserBundle:Association')->getSearchTagsList($tag);
						}
					}

					$assosByTagsTest = array();

					foreach ($assosByTags as $resultat) {
						foreach ($resultat as $r) {
							$assosByTagsTest[] = $r;
						}
					}

			        $assosByTagsTest = array_unique($assosByTagsTest);

					$results = array_intersect($assosByName, $assosByTagsTest);
		        }
		        else
		        {
		        	$results = $assosByName;
		        }
		        
	        	$results = array_slice($results, 0, 1);

				return $this->render('CFMainBundle:Project:showAll.html.twig', array
					(
						'selecteurs' => $selecteurs,
						'associations' => $results,
						'rechercheName' => $data['recherche'],
						'rechercheTags' => $data['tags'],
						'type' => $data['type']
					)
				);
            }

	        $results = array_slice($results, 0, 5);
	        
			return $this->render('CFMainBundle:Project:showAll.html.twig', array
				(
					'selecteurs' => $selecteurs,
					'projets' => $results,
					'rechercheName' => $data['recherche'],
					'rechercheTags' => $data['tags'],
					'type' => $data['type']
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
        $nom = $request->request->get('search');
        $type = $request->request->get('type');

        $em = $this->getDoctrine()->getEntityManager();

        if($type == 'projet')
        {
	        $projetsByName = $em->getRepository('CFMainBundle:Projet')->getSearchNameList($nom);

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
	    }
	    else
	    {
	    	$assosByName = $em->getRepository('CFUserBundle:Association')->getSearchNameList($nom);

	        if($request->request->get('tags'))
	        {
	        	$tags = explode(' ', $request->request->get('tags'));

	        	$assosByTags = array();
		        foreach ($tags as $key => $tag) {
		        	if (strlen($tag) > 2) {
		        		$assosByTags[] = $em->getRepository('CFUserBundle:Association')->getSearchTagsList($tag);
					}
				}

				$assosByTagsTest = array();

				foreach ($assosByTags as $resultat) {
					foreach ($resultat as $r) {
						$assosByTagsTest[] = $r;
					}
				}

		        $assosByTagsTest = array_unique($assosByTagsTest);

				$results = array_intersect($assosByName, $assosByTagsTest);
	        }
	        else
	        {
	        	$results = $assosByName;
	        }
	    }

        $results = array_slice($results, $index, 1);

        return new JsonResponse($results);
    }

	public function renderSearchAction()
	{
		$form = $this->createFormBuilder()
            ->add('recherche', 'text', array('required' => false))
            ->add('tags', 'text', array('attr' => array('id' => 'tags-form-hidden'), 'required' => false))
            ->add('type', 'choice', array('choices'   => array('association' => 'associations', 'projet' => 'projets'),'data' => 'projet'))
            ->getForm();

        return $this->render('CFMainBundle:Recherche:search_form.html.twig', array
			(
				'form' => $form->createView()
			));
	}
}