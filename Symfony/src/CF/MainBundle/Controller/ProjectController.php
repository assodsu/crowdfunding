<?php

namespace CF\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ProjectController extends Controller
{
	public function showAction($id)
    {
        $projet = $this->getDoctrine()->getRepository('CFMainBundle:Projet')->findOneById($id);

        if (!$projet) {
            throw $this->createNotFoundException(
                'Aucun projet trouvé pour cet id : '.$id
            );
        }
        return $this->render('CFMainBundle:Project:show.html.twig', array('projet'=>$projet));
    }
	
    public function showAllAction()
    {	
	
		//$tag=$_POST["tag"];
		
		$all = $this->getDoctrine()->getEntityManager()
		->createQuery('SELECT p FROM CFMainBundle:Projet p WHERE p.dateFin > CURRENT_DATE()')
        ->getResult();
		
        return $this->render('CFMainBundle:Project:showAll.html.twig',array('projets'=>$all));
    }
	
    public function showEndingAction()
    {
		$ending = $this->getDoctrine()->getEntityManager()
		->createQuery('SELECT p FROM CFMainBundle:Projet p WHERE p.dateFin > CURRENT_DATE() ORDER BY p.dateFin ASC')
        ->getResult();
		
        return $this->render('CFMainBundle:Project:showEnding.html.twig',array('projets'=>$ending));
    }
	
    public function showNewAction()
    {
		$new = $this->getDoctrine()->getEntityManager()
		->createQuery('SELECT p FROM CFMainBundle:Projet p WHERE p.dateFin > CURRENT_DATE() ORDER BY p.dateCreation ASC')
        ->getResult();
		
        return $this->render('CFMainBundle:Project:showNew.html.twig',array('projets'=>$new));
    }
	
    public function showHighlightsAction()
    {
		$high = $this->getDoctrine()->getEntityManager()
		->createQuery('SELECT p FROM CFMainBundle:Projet p WHERE p.dateFin > CURRENT_DATE() ORDER BY p.pourcentageTotal DESC')
        ->getResult();
		
        return $this->render('CFMainBundle:Project:showHighlights.html.twig',array('projets'=>$high));
    }

    public function addAction()
    {
        return $this->render('CFMainBundle:Project:add.html.twig');
    }
}
