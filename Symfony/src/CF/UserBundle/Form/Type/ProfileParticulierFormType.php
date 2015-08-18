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

            ->add('sexe', 'choice', array('label' => "Sexe : ",
                                          "attr"=>array('class'=>'form-control'),
                                          'choices' => array('m' => 'Homme', 'f' => 'Femme','n'=>'Ne souhaite pas communiquer'),
                                             'expanded' => false,
                                             'multiple' => false,
                                             'data' => 'm'
                                          ))

            ->add('dateNaissance', 'date', array('widget' => 'single_text', 'input' => 'datetime', 'format' => 'dd/MM/yyyy', 'attr' => array('class' => 'form-control datepicker')))

            ->add('ville', null, array('label' => false, 'attr' => array('class' => 'form-control')))

            ->add('cp', null, array('label' => false, 'attr' => array('class' => 'form-control')))

            ->add('adresse', null, array('label' => false, 'attr' => array('class' => 'form-control')))

            ->add('telephone', null, array('label' => false, 'attr' => array('class' => 'form-control')))

            ->add('site', null, array('label' => false, 'attr' => array('class' => 'form-control')))

            ->add('facebook', null, array('label' => false, 'attr' => array('class' => 'form-control')))

            ->add('twitter', null, array('label' => false, 'attr' => array('class' => 'form-control')))

            ->add('googleplus', null, array('label' => false, 'attr' => array('class' => 'form-control')))

            ->add('benevole', 'choice', array('label' => "Voudriez vous participer à du bénévolat ? ",
                                          'block_name' => "optionsRadios",
                                             "attr"=>array('class'=>'form-control'),                                        
                                             'choices' => array('1' => 'Oui', '0' => 'Non'),
                                             'expanded' => false,
                                             'multiple' => false
                                          ))

            ->add('email', 'email', array('label' => false, 'attr' => array('class' => 'form-control')))

            ->add('logo', new MediaType(), array('label' => "Logo/Avatar : "))
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