<?php

/*
 * This file is part of the FOSUserBundle package.
 *
 * (c) FriendsOfSymfony <http://friendsofsymfony.github.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CF\UserBundle\Controller;

use FOS\UserBundle\FOSUserEvents;
use FOS\UserBundle\Event\FormEvent;
use FOS\UserBundle\Event\FilterUserResponseEvent;
use FOS\UserBundle\Event\GetResponseUserEvent;
use FOS\UserBundle\Model\UserInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

/**
 * Controller managing the user profile
 *
 * @author Christophe Coevoet <stof@notk.org>
 */
class ProfileController extends Controller
{
    /**
     * Show the user
     */
    public function showAction()
    {
        $user = $this->getUser();
        if (!is_object($user) || !$user instanceof UserInterface) {
            throw new AccessDeniedException('This user does not have access to this section.');
        }

        $projets = $this->getDoctrine()->getRepository('CFMainBundle:Projet')->findBy(array('association' => $user));

        return $this->render('FOSUserBundle:Profile:show.html.twig', array(
            'user' => $user,
            'projets' => $projets
        ));
    }

    /**
     * Consulting user's profile
     */
    public function userShowAction($username)
    {
        $userManager = $this->container->get('fos_user.user_manager');
        $user = $userManager->findUserByUsername($username);
        $projets = $this->getDoctrine()->getRepository('CFMainBundle:Projet')->findBy(array('association' => $user));

        return $this->render('FOSUserBundle:Profile:show.html.twig', array(
            'user' => $user,
            'projets' => $projets
        ));
    }

    /**
     * Edit the user
     */
    public function editAction(Request $request)
    {
        $user = $this->getUser();
        if (!is_object($user) || !$user instanceof UserInterface) {
            throw new AccessDeniedException('This user does not have access to this section.');
        }

        /** @var $dispatcher \Symfony\Component\EventDispatcher\EventDispatcherInterface */
        $dispatcher = $this->get('event_dispatcher');

        $event = new GetResponseUserEvent($user, $request);
        $dispatcher->dispatch(FOSUserEvents::PROFILE_EDIT_INITIALIZE, $event);

        if (null !== $event->getResponse()) {
            return $event->getResponse();
        }

        /** @var $formFactory \FOS\UserBundle\Form\Factory\FactoryInterface */
        $formFactory = $this->get('fos_user.profile.form.factory');

        $form = $formFactory->createForm();
        $form->setData($user);

        $form->handleRequest($request);

        if ($form->isValid()) {
            /** @var $userManager \FOS\UserBundle\Model\UserManagerInterface */
            $userManager = $this->get('fos_user.user_manager');

            $event = new FormEvent($form, $request);
            $dispatcher->dispatch(FOSUserEvents::PROFILE_EDIT_SUCCESS, $event);

            $userManager->updateUser($user);

            if (null === $response = $event->getResponse()) {
                $url = $this->generateUrl('fos_user_profile_show');
                $response = new RedirectResponse($url);
            }

            $dispatcher->dispatch(FOSUserEvents::PROFILE_EDIT_COMPLETED, new FilterUserResponseEvent($user, $request, $response));

            $this->get('session')->getFlashBag()->add('info', 'Votre profil a bien été modifié !');

            return $response;
        }

        return $this->render('FOSUserBundle:Profile:edit.html.twig', array(
            'form' => $form->createView()
        ));
    }

    public function projectsAction()
    {
        $user = $this->container->get('security.context')->getToken()->getUser();

        $notifs = $this->getDoctrine()->getRepository('CFNotificationBundle:Notification')->getProjetsEnCours($user);

        $em = $this->getDoctrine()->getEntityManager();
        foreach ($notifs as $n) {
            $n->setVu(1);
            $em->flush();
        }

        return $this->render('CFUserBundle:Profile:projects.html.twig');
    }

    public function messagesAction()
    {
        $user = $this->container->get('security.context')->getToken()->getUser();

        $notifs = $this->getDoctrine()->getRepository('CFNotificationBundle:Notification')->getMessages($user);

        $em = $this->getDoctrine()->getEntityManager();
        foreach ($notifs as $n) {
            $n->setVu(1);
            $em->flush();
        }
           
        return $this->render('CFUserBundle:Profile:messages.html.twig');
    }

    public function projetsSuivisAction() {
        return $this->render('CFUserBundle:Profile:projetsSuivis.html.twig');
    }

    public function projetsSoutenusAction() {
        return $this->render('CFUserBundle:Profile:projetsSoutenus.html.twig');
    }
}
