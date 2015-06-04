<?php
//src CF\UserBundle\Form\Type\RegistrationFormType.php

namespace CF\UserBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

use CF\MainBundle\Form\MediaType;

class ProfileEntrepriseFormType extends AbstractType{

    private $class;

    /**
     * @param string $class The User class name
     */
    public function __construct($class)
    {
        $this->class = $class;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', 'email', array('label' => false, 'attr' => array('class' => 'form-control')))

            ->add('ville', null, array('label' => false, 'attr' => array('class' => 'form-control')))

            ->add('cp', null, array('label' => false, 'attr' => array('class' => 'form-control')))

            ->add('adresse', null, array('label' => false, 'attr' => array('class' => 'form-control')))

            ->add('telephone', null, array('label' => false, 'attr' => array('class' => 'form-control')))

            ->add('site', null, array('label' => false, 'attr' => array('class' => 'form-control')))

            ->add('facebook', null, array('label' => false, 'attr' => array('class' => 'form-control')))

            ->add('twitter', null, array('label' => false, 'attr' => array('class' => 'form-control')))

            ->add('googleplus', null, array('label' => false, 'attr' => array('class' => 'form-control')))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => $this->class,
            'intention'  => 'registration',
        ));
    }

    public function getName()
    {
        return 'cf_user_registration';
    }

}