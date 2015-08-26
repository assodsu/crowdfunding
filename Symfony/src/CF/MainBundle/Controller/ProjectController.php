<?php

namespace CF\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\JsonResponse;
use CF\MainBundle\Entity\Projet;
use CF\MainBundle\Form\ProjetType;
use CF\MainBundle\Form\ProjetEditType;
use CF\MainBundle\Entity\Participation;
use CF\MainBundle\Form\ParticipationType;
use CF\MessageBundle\Entity\Conversation;
use CF\CommentBundle\Entity\Thread;
use CF\MainBundle\Entity\Media;

class ProjectController extends Controller
{
	public function showAction(Projet $projet)
    {
        $user = $this->container->get('security.context')->getToken()->getUser();

        if($projet->getValider() == true || $this->container->get('security.context')->isGranted('ROLE_ADMIN') || $projet->getAssociation() == $user )
        {
            $boxs = $this->getDoctrine()->getEntityManager()->getRepository('CFMainBundle:Box')->getBoxsCroissant($projet);

            return $this->render('CFMainBundle:Project:show.html.twig', array('projet' => $projet, 'boxs' => $boxs));
        }
        else 
        {
            throw $this->createNotFoundException('Ce projet n\'a pas encore été validé par l\'administrateur');
        }
    }
	
    public function showAllAction()
    {	
		$projets = $this->getDoctrine()->getRepository('CFMainBundle:Projet')->getValidate(0,5);
        $selecteurs = $this->getDoctrine()->getRepository('CFMainBundle:Selecteur')->getSelecteursLesProjets();
		
        return $this->render('CFMainBundle:Project:showAll.html.twig',array('projets'=>$projets, 'selecteurs' => $selecteurs, 'type' => 'projet'));
    }

    public function addAction(Request $request)
    {
        if (!$this->get('security.context')->isGranted('ROLE_USER')) {
            $this->get('session')->getFlashBag()->add('warning', 'Vous devez être obligatoirement authentifié sur le site en tant qu\'association pour pouvoir déposer un projet.');
            return $this->redirect($this->generateUrl('fos_user_security_login'));
        }

        if (!$this->get('security.context')->getToken()->getUser()->getTypeUser() == 'Association') {
            $this->get('session')->getFlashBag()->add('warning', 'Vous devez être obligatoirement authentifié sur le site en tant qu\'association pour pouvoir déposer un projet.');
            return $this->redirect($this->generateUrl('fos_user_security_login'));
        }

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

                $thread = new Thread();
                $thread->setProjet($projet);

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
                
                $em->persist($thread);
                $em->persist($projet);
                $em->flush();

                $this->get('session')->getFlashBag()->add('info', 'Votre projet a bien été déposé, il est en attente de validation par un administrateur.');
                
                return $this->redirect($this->generateUrl('fos_user_profile_projects'));
            }
        }

        return $this->render('CFMainBundle:Project:add.html.twig', array('form' => $form->createView()));
    }

    public function participateAction(Projet $projet, Request $request) 
    {
        $user = $this->container->get('security.context')->getToken()->getUser();

        if($user == $projet->getAssociation())
        {
            return $this->render('CFMainBundle:Project:show.html.twig',array('projet' => $projet));
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
                
                $alreadyActor = false;
                foreach ($projet->getActeurs() as $acteur) {
                    if($acteur == $user)
                    {
                        $alreadyActor = true;
                    }
                }
                if($alreadyActor == false)
                {
                    $projet->addActeur($user);
                }

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
                $em->persist($projet);
                $em->persist($participation);
                $em->persist($conversation);
                $em->flush();

                $this->get('session')->getFlashBag()->add('info', 'Merci ! Votre participation a bien été prise en compte.');

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
        $user = $this->container->get('security.context')->getToken()->getUser();
        if($projet->getAssociation() == $user) {
            $form = $this->createForm(new ProjetEditType(), $projet);

            if($request->getMethod() == 'POST')
            {
                $form->bind($request);

                if($form->isValid())
                {
                    $em = $this->getDoctrine()->getEntityManager();
                    $projet = $form->getData();

                    $media = new Media();
                    $data  = $request->files->get($form->getName());

                    $testBackground = '';
                    
                    foreach ($data['background'] as $l)
                        $testBackground = $l;

                    if($testBackground != '')
                    {
                        foreach ($data['background'] as $l)
                            $media->setFile($l);

                        $projet->setBackground($media);
                    }

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
        else {
            throw $this->createNotFoundException('Vous n\'êtes pas le créateur de ce projet !');
        }
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
