<?php

namespace CF\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use CF\MainBundle\Entity\ConnexionForm;

class ConnectController extends Controller
{
    public function indexAction()
    {
    	//creation d'une instance de ConnexionForm
    	$conForm=new ConnexionForm();

    	//creation du formulaire grace au service form factory
    	$formBuilder=$this->get('form.factory')->createBuilder('form',$conForm);

    	//ajout des champs au formulaire
    	$formBuilder
    		->add('identifiant',	'text')
    		->add('password',	'password')
            ->add('save','checkbox')
    		->add('connexion',		'submit')
    	;

    	//generation du formulaire
    	$form=$formBuilder->getForm();

    	//retour de la vue et création de la vue du formulaire par la methode createView()
        return $this->render('CFMainBundle:Connect:connexion.html.twig',array(
        	'form'=>$form->createView(),
        	));
    }
	
}
