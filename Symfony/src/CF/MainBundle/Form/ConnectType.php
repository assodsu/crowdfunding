<?php

namespace CF\MainBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ConnectType extends AbstractType
{

	public function buildForm(FormBuilderInterface $builder, array $options){

		$builder
			->add('identifiant','text',array(
				"label"=>"identifiant",
				))
    		->add('password','password',array(
    			"label"=>"Mot de passe",
    			))
            ->add('save','checkbox',array(
            	"label"=>"Ce souvenir de moi",
            	))
    		->add('connexion','submit',array(
                "attr"=>array(
                    "class"=>"btn btn-primary"
                    ),
                ))
    	;

	}

	public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'CF\MainBundle\Entity\Connect'
        ));
    }

    public function getName(){return "Connect";}





}