<?php

namespace CF\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\Request;
use CF\MainBundle\Entity\Actualite;
use CF\MainBundle\Entity\Projet;
use CF\MainBundle\Form\ActualiteType;

use JMS\SecurityExtraBundle\Annotation\Secure;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

class ActualiteController extends Controller
{
    public function redigerAction(Request $request, Projet $projet) {
        if (false === $this->get('security.authorization_checker')->isGranted('ROLE_USER')) {
            throw new AccessDeniedException();
        }

        $user = $this->getUser();

        if ($projet->getAssociation() !== $user) {
            throw new AccessDeniedException();
        }

        $actualite = new Actualite();
        $form = $this->createForm(new ActualiteType(), $actualite);

        if($request->getMethod() == 'POST')
        {
            $actualite->setProjet($projet);
            
            $form->bind($request);
            if($form->isValid())
            {
                $em = $this->getDoctrine()->getEntityManager();
                $em->persist($actualite);
                $em->flush();
            }

            $this->get('session')->getFlashBag()->add('info', 'La mise à jour a bien été ajoutée !');

            return $this->redirect($this->generateUrl('cf_main_project', array('slug' => $projet->getSlug())));
        }

        return $this->render('CFMainBundle:Actualite:add.html.twig', array('form' => $form->createView()));
    }

    public function editerAction(Request $request, Actualite $actualite) {
        if (false === $this->get('security.authorization_checker')->isGranted('ROLE_USER')) {
            throw new AccessDeniedException();
        }

        $user = $this->getUser();

        if ($actualite->getProjet()->getAssociation() !== $user) {
            throw new AccessDeniedException();
        }

        $form = $this->createForm(new ActualiteType(), $actualite);

        if($request->getMethod() == 'POST')
        {
            
            $form->bind($request);
            if($form->isValid())
            {
                $em = $this->getDoctrine()->getEntityManager();
                $em->persist($actualite);
                $em->flush();
            }

            $this->get('session')->getFlashBag()->add('info', 'La mise à jour a bien été modifiée !');

            return $this->redirect($this->generateUrl('cf_main_project', array('slug' => $actualite->getProjet()->getSlug())));
        }

        return $this->render('CFMainBundle:Actualite:add.html.twig', array('form' => $form->createView()));
    }

    public function supprimerAction(Request $request, Actualite $actualite) {
        if (false === $this->get('security.authorization_checker')->isGranted('ROLE_USER')) {
            throw new AccessDeniedException();
        }

        $user = $this->getUser();

        if ($actualite->getProjet()->getAssociation() !== $user) {
            throw new AccessDeniedException();
        }

        // Création du formulaire
        $form = $this->createFormBuilder()->getForm();

        if ($request->getMethod() == 'POST') {
            $form->bind($request);
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getEntityManager();
                $em->remove($actualite);
                $em->flush();
                  
                $this->get('session')->getFlashBag()->add('info', 'La mise à jour a bien été supprimée.');

                return $this->redirect($this->generateUrl('cf_main_project', array('slug' => $actualite->getProjet()->getSlug())));
            }
        }
         
        // Affichage de la confirmation de suppression
        return $this->render('CFMainBundle:Actualite:supprimer.html.twig', 
                 array(
                       'form' => $form->createView()
                       ));
    }
}
