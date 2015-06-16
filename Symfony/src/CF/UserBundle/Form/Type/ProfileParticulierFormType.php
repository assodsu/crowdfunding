<?php
//src CF\UserBundle\Form\Type\RegistrationFormType.php

namespace CF\UserBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

use CF\MainBundle\Form\MediaType;

class ProfileParticulierFormType extends AbstractType{

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
            ->add('name', null, array('label' => false, 'attr' => array('class' => 'form-control')))

            ->add('firstname', null, array('label' => false, 'attr' => array('class' => 'form-control')))

            ->add('sexe', 'choice', array('label' => false,
                                          'choices' => array('m' => 'Homme', 'f' => 'Femme'),
                                             'expanded' => true,
                                             'multiple' => false,
                                             'data' => 'm'
                                          ))

            ->add('dateNaissance', null, array('label' => false,
                                              'years' => range(date('Y')-100,date('Y')))
                                              )

            ->add('ville', null, array('label' => false, 'attr' => array('class' => 'form-control')))

            ->add('cp', null, array('label' => false, 'attr' => array('class' => 'form-control')))

            ->add('adresse', null, array('label' => false, 'attr' => array('class' => 'form-control')))

            ->add('telephone', null, array('label' => false, 'attr' => array('class' => 'form-control')))

            ->add('site', null, array('label' => false, 'attr' => array('class' => 'form-control')))

            ->add('facebook', null, array('label' => false, 'attr' => array('class' => 'form-control')))

            ->add('twitter', null, array('label' => false, 'attr' => array('class' => 'form-control')))

            ->add('googleplus', null, array('label' => false, 'attr' => array('class' => 'form-control')))

            ->add('benevole', 'choice', array('label' => false,
                                          'choices' => array('1' => 'Oui', '0' => 'Non'),
                                             'expanded' => true,
                                             'multiple' => false,
                                             'data' => '0'
                                          ))

            ->add('email', 'email', array('label' => false, 'attr' => array('class' => 'form-control')))

            ->add('logo', new MediaType(), array('label' => false, 'attr' => array('class' => 'form-control')))
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