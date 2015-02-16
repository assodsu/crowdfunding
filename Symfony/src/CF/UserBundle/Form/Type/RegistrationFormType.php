<?php
//src CF\UserBundle\Form\Type\RegistrationFormType.php

namespace CF\UserBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class RegistrationFormType extends AbstractType{

	public function buildForm(FormBuilderInterface $builder, array $options){
		//ajout des champs au formulaire


	}

	public function getParent()
    {
        return 'fos_user_registration';
    }

    public function getName()
    {
        return 'cf_user_registration';
    }

}