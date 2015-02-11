<?php

namespace CF\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use CF\MainBundle\Entity\Connect;
use CF\MainBundle\Form\ConnectType;
class ConnectController extends Controller
{
    public function indexAction()
    {
    	//creation d'une instance de ConnexionForm
    	$connect=new Connect();

    	//création du formulaire 
        $form = $this->createForm(new ConnectType(), $connect);

    	//retour de la vue et création de la vue du formulaire par la methode createView()
        return $this->render('CFMainBundle:Connect:connexion.html.twig',array(
        	'form'=>$form->createView(),
        	));
    }
	
}
