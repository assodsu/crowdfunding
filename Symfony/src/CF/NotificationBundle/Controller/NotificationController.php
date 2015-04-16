<?php

namespace CF\NotificationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class NotificationController extends Controller
{
    public function indexAction()
    {
    	$user = $this->container->get('security.context')->getToken()->getUser();

    	$notifs = $this->getDoctrine()->getRepository('CFNotificationBundle:Notification')->findUserNotification($user);

        return $this->render('CFNotificationBundle:Notification:index.html.twig', array('notifs' => $notifs));
    }
}
