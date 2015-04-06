<?php

namespace CF\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use CF\MainBundle\Entity\Projet;
use CF\MainBundle\Form\ProjetType;
use CF\MainBundle\Entity\Dons;
use CF\MainBundle\Form\DonsType;

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
		$all = $this->getDoctrine()->getEntityManager()
		->createQuery('SELECT p FROM CFMainBundle:Projet p WHERE p.dateFin > CURRENT_DATE()')
        ->getResult();
		$tagprojet = $this->getDoctrine()->getEntityManager()
		->createQuery('SELECT t FROM CFMainBundle:Tags t')
        ->getResult();
		
        return $this->render('CFMainBundle:Project:showAll.html.twig',array('projets'=>$all,'tags'=>$tagprojet));
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

    public function addAction(Request $request)
    {
        $projet = new Projet();
        $form = $this->createForm(new ProjetType(), $projet);

        
        if($request->getMethod() == 'POST')
        {
            $user = $this->container->get('security.context')->getToken()->getUser();
            $projet->setIdAsso($user);
            
            $form->bind($request);
            if($form->isValid())
            {
                $em = $this->getDoctrine()->getEntityManager();
                $projet = $form->getData();

                $besoins = $projet->getBesoins();
                foreach($besoins as $besoin)
                {
                    $besoin->setProjet($projet);
                }

                $boxs = $projet->getBoxs();
                foreach($boxs as $box)
                {
                    $box->setProjet($projet);
                }
                
                $em->persist($projet);
                $em->flush();
                
                return $this->redirect($this->generateUrl('cf_main_project', array('id' => $projet->getId())));
            }
        }

        return $this->render('CFMainBundle:Project:add.html.twig', array('form' => $form->createView()));
    }

    public function redigerActuAction($id,Request $request)
    {

            $user = $this->container->get('security.context')->getToken()->getUser();
            if(!$user)
            {
                    return $this->redirect('fos_user_security_login');
            }
            else
            {
                $projet = $this->getDoctrine()->getRepository('CFMainBundle:Projet')->findOneById($id);
                if (!$projet) 
                {
                    throw $this->createNotFoundException(
                        'Aucun projet trouvé pour cet id : '.$id
                    );
                }
                
                $actu = new Actualites();
                $form= $this->createForm(new ActualitesType(),$actu);

                $actu->setIdProjet($projet);

                if($request->getMethod()=='POST')
                {
                    $form->bind($request);
                    if($form->isValid())
                    {
                        $em=$this->getDoctrine()->getEntityManager();
                        $actu = $form->getData();

                        $em->persist($actu);
                        $em->flush();

                        return $this->redirect('cf_main_project',array('id'=>$actu->getIdProjet()));
                    }
                }
                return $this->render('CFMainBundle:Project:redigerActu.html.twig',array('projet'=>$projet));
            }
            
        }

        public function participateAction($id, Request $request) 
        {
            $projet = $this->getDoctrine()->getRepository('CFMainBundle:Projet')->findOneById($id);

            if (!$projet) {
                throw $this->createNotFoundException(
                    'Aucun projet trouvé pour cet id : '.$id
                );
            }

            $dons = new Dons();
            $form= $this->createForm(new DonsType($projet),$dons);

            if($request->getMethod() == 'POST')
            {
                //Traitement BDD
                $form->bind($request);
                if($form->isValid())
                {
                    $em=$this->getDoctrine()->getEntityManager();
                    $don = $form->getData();

                    $em->persist($don);
                    $em->flush();

                    return $this->redirect($this->generateUrl('cf_main_project', array('id' => $projet->getId())));
                }
            }
                
            return $this->render('CFMainBundle:Project:participate.html.twig',array('form' => $form->createView(), 'projet'=>$projet));
        }
}
