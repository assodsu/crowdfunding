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
}
