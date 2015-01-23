<?php

namespace CF\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PageController extends Controller
{
    public function indexAction()
    {
        return $this->render('CFMainBundle:Page:index.html.twig');
    }
	
	public function profilAction()
	{
		return $this->render('CFMainBundle:Page:profil.html.twig');
	}
}
