<?php

namespace CF\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\Request;
use CF\MainBundle\Entity\Box;
use CF\MainBundle\Entity\Projet;
use CF\MainBundle\Form\BoxType;

use JMS\SecurityExtraBundle\Annotation\Secure;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

class BoxController extends Controller
{
    public function redigerAction(Request $request, Projet $projet) {
        if (false === $this->get('security.authorization_checker')->isGranted('ROLE_USER')) {
            throw new AccessDeniedException();
        }

        $user = $this->getUser();

        if ($projet->getAssociation() !== $user) {
            throw new AccessDeniedException();
        }

        $box = new Box();
        $form = $this->createForm(new BoxType(), $box);

        if($request->getMethod() == 'POST')
        {
            $box->setProjet($projet);
            
            $form->bind($request);
            if($form->isValid())
            {
                $em = $this->getDoctrine()->getEntityManager();
                $em->persist($box);
                $em->flush();
            }

            $this->get('session')->getFlashBag()->add('info', 'La box a bien été ajoutée !');

            return $this->redirect($this->generateUrl('cf_main_project', array('slug' => $projet->getSlug())));
        }

        return $this->render('CFMainBundle:Box:add.html.twig', array('form' => $form->createView(), 'projet' => $projet));
    }

    public function editerAction(Request $request, Box $box) {
        if (false === $this->get('security.authorization_checker')->isGranted('ROLE_USER')) {
            throw new AccessDeniedException();
        }

        $user = $this->getUser();

        if ($box->getProjet()->getAssociation() !== $user) {
            throw new AccessDeniedException();
        }

        $form = $this->createForm(new BoxType(), $box);

        if($request->getMethod() == 'POST')
        {
            
            $form->bind($request);
            if($form->isValid())
            {
                $em = $this->getDoctrine()->getEntityManager();
                $em->persist($box);
                $em->flush();
            }

            $this->get('session')->getFlashBag()->add('info', 'La box a bien été modifiée !');

            return $this->redirect($this->generateUrl('cf_main_project', array('slug' => $box->getProjet()->getSlug())));
        }

        return $this->render('CFMainBundle:Box:add.html.twig', array('form' => $form->createView(), 'projet' => $box->getProjet()));
    }

    public function supprimerAction(Request $request, Box $box) {
        if (false === $this->get('security.authorization_checker')->isGranted('ROLE_USER')) {
            throw new AccessDeniedException();
        }

        $user = $this->getUser();

        if ($box->getProjet()->getAssociation() !== $user) {
            throw new AccessDeniedException();
        }

        // Création du formulaire
        $form = $this->createFormBuilder()->getForm();

        if ($request->getMethod() == 'POST') {
            $form->bind($request);
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getEntityManager();
                $em->remove($box);
                $em->flush();
                  
                $this->get('session')->getFlashBag()->add('info', 'La box a bien été supprimée.');

                return $this->redirect($this->generateUrl('cf_main_project', array('slug' => $box->getProjet()->getSlug())));
            }
        }
         
        // Affichage de la confirmation de suppression
        return $this->render('CFMainBundle:Box:supprimer.html.twig', 
                 array(
                       'form' => $form->createView()
                       ));
    }
}
