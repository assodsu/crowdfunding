<?php

namespace CF\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PagesController extends Controller
{
    public function commentcamarcheAction()
    {
        return $this->render('CFSiteBundle:Pages:commentcamarche.html.twig');
    }

    public function partenairesAction()
    {
        return $this->render('CFSiteBundle:Pages:partenaires.html.twig');
    }

    public function contactAction()
    {
        return $this->render('CFSiteBundle:Pages:contact.html.twig');
    }

    public function developpeursAction()
    {
        return $this->render('CFSiteBundle:Pages:developpeurs.html.twig');
    }

    public function conditionsAction()
    {
        return $this->render('CFSiteBundle:Pages:conditions.html.twig');
    }

    public function aproposAction()
    {
        return $this->render('CFSiteBundle:Pages:apropos.html.twig');
    }
}
