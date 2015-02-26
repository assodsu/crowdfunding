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
            ->add('pseudo', null, array('label' => "Pseudo : "))

            ->add('nom', null, array('label' => "Nom : "))

            ->add('prenom', null, array('label' => "Prénom : "))

            ->add('sexe', 'choice', array('label' => "Sexe : ",
                                          'choices' => array('m' => 'Homme', 'f' => 'Femme'),
                                             'expanded' => true,
                                             'multiple' => false,
                                             'data' => 'm'
                                          ))

            ->add('dateNaissance', null, array('label' => "Date de naissance : ",
                                              'years' => range(date('Y')-100,date('Y')))
                                              )

            ->add('ville', null, array('label' => "Ville : "))

            ->add('cp', null, array('label' => "Code postal : "))

            ->add('adresse', null, array('label' => "Adresse : "))

            ->add('telephone', null, array('label' => "Numéro de téléphone : "))

            ->add('site', null, array('label' => "Site internet : "))

            ->add('facebook', null, array('label' => "Facebook : "))

            ->add('twitter', null, array('label' => "Twitter : "))

            ->add('googleplus', null, array('label' => "Google+ : "))

            ->add('benevole', 'choice', array('label' => "Voudriez vous participer à du bénévolat ? ",
                                          'block_name' => "optionsRadios",
                                          'choices' => array('1' => 'Oui', '0' => 'Non'),
                                             'expanded' => true,
                                             'multiple' => false,
                                             'data' => '0'
                                          ))

            ->add('logo', new MediaType(), array('label' => "Logo/Avatar : "))

            ->add('email', 'email', array('label' => 'Adresse e-mail : '))

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