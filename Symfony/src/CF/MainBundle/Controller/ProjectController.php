<?php

namespace CF\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use CF\MainBundle\Entity\Projet;
use CF\MainBundle\Form\ProjetType;

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

    public function addAction(Request $request)
    {
        $projet = new Projet();
        $form = $this->createForm(new ProjetType(), $projet);

        $user = $this->container->get('security.context')->getToken()->getUser();
        $projet->setIdAsso($user);
        
        if($request->getMethod() == 'POST')
        {
            $form->bind($request);
            if($form->isValid())
            {
                $em = $this->getDoctrine()->getEntityManager();
                $projet = $form->getData();
                
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
}
