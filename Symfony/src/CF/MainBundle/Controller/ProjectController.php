<?php

namespace CF\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use CF\MainBundle\Entity\Projet;
use CF\MainBundle\Form\ProjetType;
use CF\MainBundle\Form\ProjetEditType;
use CF\MainBundle\Entity\Participation;
use CF\MainBundle\Form\ParticipationType;
use CF\MessageBundle\Entity\Conversation;

class ProjectController extends Controller
{
	public function showAction(Projet $projet)
    {
        $boxs = $this->getDoctrine()->getEntityManager()->getRepository('CFMainBundle:Box')->getBoxsCroissant($projet);

        return $this->render('CFMainBundle:Project:show.html.twig', array('projet' => $projet, 'boxs' => $boxs));
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

                $this->get('session')->getFlashBag()->add('info', 'Votre projet a bien été déposé, il est en attente de validation par un administrateur. Un e-mail vous sera envoyé pour savoir si oui ou non votre projet a été accepté');
                
                return $this->redirect($this->generateUrl('cf_main_project', array('slug' => $projet->getSlug())));
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

                    $this->get('session')->getFlashBag()->add('info', 'Votre actualité a bien été ajouté.');

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
                if (isset($_POST['accept'])) {
                $em=$this->getDoctrine()->getEntityManager();
                $participation = $form->getData();

                $projet->setNbDonateur($projet->getNbDonateur()+1);

                $conversation = $this->getDoctrine()->getEntityManager()
                    ->createQuery('SELECT c FROM CFMessageBundle:Conversation c JOIN c.utilisateurs u WHERE (u.id = :user AND c.projet = :projet)')
                    ->setParameters(array(
                        'user' => $user->getId(),
                        'projet' => $projet,
                    ))
                    ->getOneOrNullResult();

                if(!$conversation)
                {
                    $conversation = new Conversation();
                    $conversation->setProjet($projet);
                    $conversation->addUtilisateur($user);
                    $conversation->addUtilisateur($projet->getAssociation());
                }


                $dons = $participation->getDons();
                foreach($dons as $don)
                {
                    $don->setParticipation($participation);
                    $don->setConversation($conversation);

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

                    $user->removeProjetsSoutenus($projet);
                    $user->addProjetsSoutenus($projet);
                    $em->persist($user);
            
                $em->persist($participation);
                $em->persist($conversation);
                $em->flush();

                $this->get('session')->getFlashBag()->add('info', 'Votre participation a bien été prise en compte.');

                return $this->redirect($this->generateUrl('cf_main_project', array('slug' => $projet->getSlug())));
            } else {
                $this->get('session')->getFlashBag()->add('info', 'Vous devez accepter les conditions dutilisations !');
                return $this->redirect($this->generateUrl('cf_main_project', array('slug' => $projet->getSlug())));
            }
            }
        }
            
        return $this->render('CFMainBundle:Project:participate.html.twig',array('form' => $form->createView(), 'projet'=>$projet));
    }

    public function modifierAction(Projet $projet, Request $request) 
    {
        if (!$projet) {
            throw $this->createNotFoundException(
                'Aucun projet trouvé pour cet id : '.$projet->getId());
        }

        $form = $this->createForm(new ProjetEditType(), $projet);

        if($request->getMethod() == 'POST')
        {
            $form->bind($request);

            if($form->isValid())
            {
                $em = $this->getDoctrine()->getEntityManager();
                $projet = $form->getData();


                $boxs = $projet->getBoxs();
                foreach($boxs as $box)
                {
                    $box->setProjet($projet);
                }
                
                $em->persist($projet);
                $em->flush();
                
                $this->get('session')->getFlashBag()->add('info', 'Votre projet a bien été modifié !');

                return $this->redirect($this->generateUrl('cf_main_project', array('slug' => $projet->getSlug())));
            }
        }

        return $this->render('CFMainBundle:Project:modifier.html.twig', array(
                'form' => $form->createView(),
                'projet' => $projet
            ));
    }

    public function suivreProjetAction(Projet $projet) 
    {
        $user = $this->getUser();

        if (!$user->hasProjetsSuivis($projet)) {
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($user);
            $user->addProjetsSuivi($projet);
            $em->flush();

            $this->get('session')->getFlashBag()->add('info', 'Le projet a bien été ajouté à vos projets suivis, vous pouvez désormais suivre l\'avancement du projet dans les paramètres de votre compte.');
        } else {
            $this->get('session')->getFlashBag()->add('info', 'Vous suivez déjà ce projet.');
        }

        return $this->redirect($this->generateUrl('cf_main_project', array('slug' => $projet->getSlug())));
    }

    public function notSuivreProjetAction(Projet $projet) 
    {
        $user = $this->getUser();

        if ($user->hasProjetsSuivis($projet)) {
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($user);
            $user->removeProjetsSuivi($projet);
            $em->flush();

            $this->get('session')->getFlashBag()->add('info', 'Vous ne suivez plus ce projet.');
        } else {
            $this->get('session')->getFlashBag()->add('info', 'Vous ne suivez déjà pas ce projet.');
        }

        return $this->redirect($this->generateUrl('cf_main_project', array('slug' => $projet->getSlug())));
    }
}
