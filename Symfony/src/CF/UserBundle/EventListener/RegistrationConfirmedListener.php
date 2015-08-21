<?php

namespace CF\UserBundle\EventListener;

use FOS\UserBundle\FOSUserEvents;
use FOS\UserBundle\Event\UserEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

//listener changeant la route de redirection apres l'inscription

class RegistrationConfirmedListener implements EventSubscriberInterface
{
    private $router;

    public function __construct(UrlGeneratorInterface $router)
    {
        $this->router = $router;
    }

    /**
     * {@inheritDoc}
     */
    public static function getSubscribedEvents()
    {
        return array(
                FOSUserEvents::REGISTRATION_CONFIRM => 'onRegistrationConfirmed'
        );
    }

    public function onRegistrationConfirmed()
    {
        $url = $this->router->generate('inscription_confirmee');
        $response = new RedirectResponse($url);
        return $response;
    }

}