<?php

namespace CF\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use CF\MainBundle\Entity\InscriptionBeggin;
use Symfony\Component\HttpFoundation\Request;

class InscController extends Controller
{
	/*indexAction -> determination du type d'utilisateur*/	
	public function indexAction(){
		//création d'une instance de InscriptionBeggin
		$inscBeg=new InscriptionBeggin();

		//creation du formulaire grace au service form factory
    	$formBuilder=$this->get('form.factory')->createBuilder('form',$inscBeg);

    	//ajout des bottons radio et de la validation
    	$formBuilder
    		->add('type','choice',array(
    				'choices' => array('asso'=>'association','entr'=>'entreprise','part'=>'particulier'),
    				'multiple' => false,
    				'expanded' => true,
    			)
    		)
    		->add('valider','submit')
    	;

    	//generation du formulaire
    	$form=$formBuilder->getForm();

    	
    	//retour de la vue et création de la vue du formulaire par la methode createView()
        return $this->render('CFMainBundle:Inscription:inscriptionIndex.html.twig',array(
        	'form'=>$form->createView(),
        	));

	}

	/*assoAction -> l'utilisateur est une association*/
	public function assoAction(){

		return $this->render('CFMainBundle:Inscription:inscriptionAsso.html.twig');

	}

	/*entrAction -> l'utilisateur est une entreprise*/
	public function entrAction(){

		return $this->render('CFMainBundle:Inscription:inscriptionEntr.html.twig');
	}


	/*partAction -> l'utilisateur est une entreprise*/
	public function partAction(){

		return $this->render('CFMainBundle:Inscription:inscriptionPart.html.twig');
	}


}