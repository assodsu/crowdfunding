<?php

namespace CF\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class RegistrationConfirmController extends Controller{

	public function confirmedAction(){

		return $this->render('CFUserBundle:Registration:confirmed.html.twig');
	}


}