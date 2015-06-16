<?php
//src CF\UserBundle\Form\Type\RegistrationFormType.php

namespace CF\UserBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

use CF\MainBundle\Form\MediaType;

class RegistrationParticulierFormType extends AbstractType{

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
            ->add('nom', null, array('label' => "Pseudo : ","attr"=>array('class'=>'form-control')))

            ->add('name', null, array('label' => "Nom : ","attr"=>array('class'=>'form-control')))

            ->add('firstname', null, array('label' => "Prénom : ","attr"=>array('class'=>'form-control')))

            ->add('sexe', 'choice', array('label' => "Sexe : ",
                                          "attr"=>array('class'=>'form-control'),
                                          'choices' => array('m' => 'Homme', 'f' => 'Femme','n'=>'Ne souhaite pas communiquer'),
                                             'expanded' => false,
                                             'multiple' => false,
                                             'data' => 'm'
                                          ))

            ->add('dateNaissance', 'date', array('widget' => 'single_text', 'input' => 'datetime', 'format' => 'dd/MM/yyyy', 'attr' => array('class' => 'form-control datepicker')))

            ->add('ville', null, array('label' => "Ville : ","attr"=>array('class'=>'form-control')))

            ->add('cp', null, array('label' => "Code postal : ","attr"=>array('class'=>'form-control')))

            ->add('adresse', null, array('label' => "Adresse : ","attr"=>array('class'=>'form-control')))

            ->add('telephone', null, array('label' => "Numéro de téléphone : ","attr"=>array('class'=>'form-control')))

            ->add('site', null, array('label' => "Site internet : ","attr"=>array('class'=>'form-control')))

            ->add('facebook', null, array('label' => "Facebook : ", "attr"=>array('class'=>'form-control')))

            ->add('twitter', null, array('label' => "Twitter : ","attr"=>array('class'=>'form-control')))

            ->add('googleplus', null, array('label' => "Google+ : ","attr"=>array('class'=>'form-control')))

            ->add('benevole', 'choice', array('label' => "Voudriez vous participer à du bénévolat ? ",
                                          'block_name' => "optionsRadios",
                                             "attr"=>array('class'=>'form-control'),                                        
                                             'choices' => array('1' => 'Oui', '0' => 'Non'),
                                             'expanded' => false,
                                             'multiple' => false,
                                             'data' => '0'
                                          ))

            ->add('logo', new MediaType(), array('label' => "Logo/Avatar : "))

            ->add('email', 'email', array('label' => 'Adresse e-mail : ',"attr"=>array('class'=>'form-control')))

            ->add('plainPassword', 'repeated', array(
                'type' => 'password',
                'options' => array('translation_domain' => 'FOSUserBundle'),
                'first_options' => array('label' => 'Mot de passe : '),
                'second_options' => array('label' => 'Confirmation : '),
                'invalid_message' => 'fos_user.password.mismatch',
            ))
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