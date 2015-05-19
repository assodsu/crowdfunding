<?php

namespace CF\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use CF\MainBundle\Entity\Projet;
use CF\MainBundle\Form\ProjetType;
use CF\MainBundle\Entity\Participation;
use CF\MainBundle\Form\ParticipationType;
use CF\MessageBundle\Entity\Conversation;

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
	
    public function showAllAction($nom)
    {	
		$all = $this->getDoctrine()->getRepository('CFMainBundle:Projet')->findAll();
		
        return $this->render('CFMainBundle:Project:showAll.html.twig',array('projets'=>$all,'categories'=>$nom));
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
            $projet->setAssociation($user);
            
            $form->bind($request);
            if($form->isValid())
            {
                $em = $this->getDoctrine()->getEntityManager();
                $projet = $form->getData();

                $besoins = $projet->getBesoins();
                foreach($besoins as $besoin)
                {
                    $besoin->setProjet($projet);
                    if($besoin->getType() == 'financier')
                    {
                        $projet->setNbDemandeFinancier($projet->getNbDemandeFinancier()+$besoin->getQuantiteDemande());
                    }
                    else if($besoin->getType() == 'benevole')
                    {
                        $projet->setNbDemandeHumain($projet->getNbDemandeHumain()+$besoin->getQuantiteDemande());
                    }
                    else if($besoin->getType() == 'materiel')
                    {
                        $projet->setNbDemandeMateriel($projet->getNbDemandeMateriel()+$besoin->getQuantiteDemande());
                    }
                    else if($besoin->getType() == 'communication')
                    {
                        $projet->setNbDemandeComm($projet->getNbDemandeComm()+$besoin->getQuantiteDemande());
                    }
                    $projet->setNbRessources($projet->getNbRessources()+$besoin->getQuantiteDemande());
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

        $participation = new Participation();
        $form= $this->createForm(new ParticipationType($projet),$participation);

        if($request->getMethod() == 'POST')
        {
            $user = $this->container->get('security.context')->getToken()->getUser();
            $participation->setFournisseur($user);
            //Traitement BDD
            $form->bind($request);
            if($form->isValid())
            {
                $em=$this->getDoctrine()->getEntityManager();
                $participation = $form->getData();

                $projet->setNbDonateur($projet->getNbDonateur()+1);

                $conversation = new Conversation();
                $conversation->addUtilisateur($user);
                $conversation->addUtilisateur($projet->getAssociation());

                $dons = $participation->getDons();
                foreach($dons as $don)
                {
                    $don->setParticipation($participation);
                    $besoin = $don->getBesoin();
                    $besoin->setQuantiteActuelle($besoin->getQuantiteActuelle()+$don->getQuantite());

                    if($besoin->getType() == 'financier')
                    {
                        $projet->setNbActuFinancier($projet->getNbActuFinancier()+$don->getQuantite());
                    }
                    else if($besoin->getType() == 'benevole')
                    {
                        $projet->setNbActuHumain($projet->getNbActuHumain()+$don->getQuantite());
                    }
                    else if($besoin->getType() == 'materiel')
                    {
                        $projet->setNbActuMateriel($projet->getNbActuMateriel()+$don->getQuantite());
                    }
                    else if($besoin->getType() == 'communication')
                    {
                        $projet->setNbActuComm($projet->getNbActuComm()+$don->getQuantite());
                    }
                }

                $em->persist($participation);
                $em->persist($conversation);
                $em->flush();

                return $this->redirect($this->generateUrl('cf_main_project', array('id' => $projet->getId())));
            }
        }
            
        return $this->render('CFMainBundle:Project:participate.html.twig',array('form' => $form->createView(), 'projet'=>$projet));
    }
}
