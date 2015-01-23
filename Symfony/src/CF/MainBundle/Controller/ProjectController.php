<?php

namespace CF\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ProjectController extends Controller
{
	public function showAction($id)
    {
        return $this->render('CFMainBundle:Project:show.html.twig', array('id'=>$id));
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
}
