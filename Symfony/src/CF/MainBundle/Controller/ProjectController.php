<?php

namespace CF\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ProjectController extends Controller
{
	public function showAction($id)
    {
        $projet = $this->getDoctrine()->getRepository('CFMainBundle:Projet')->findOneById($id);
        $besoins = $this->getDoctrine()->getRepository('CFMainBundle:Besoins')->findBy(array('idProjet' => $id));

        if (!$projet) {
            throw $this->createNotFoundException(
                'Aucun projet trouvé pour cet id : '.$id
            );
        }
        return $this->render('CFMainBundle:Project:show.html.twig', array('projet'=>$projet, 'besoins'=>$besoins));
    }
	
    public function showAllAction()
    {
        return $this->render('CFMainBundle:Project:showAll.html.twig');
    }
	
    public function showEndingAction()
    {
        return $this->render('CFMainBundle:Project:showEnding.html.twig');
    }
	
    public function showNewAction()
    {
        return $this->render('CFMainBundle:Project:showNew.html.twig');
    }
	
    public function showHighlightsAction()
    {
        return $this->render('CFMainBundle:Project:showHighlights.html.twig');
    }

    public function addAction()
    {
        return $this->render('CFMainBundle:Project:add.html.twig');
    }
}
