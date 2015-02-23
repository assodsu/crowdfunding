<?php
//src CF\UserBundle\Form\Type\RegistrationFormType.php

namespace CF\UserBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

use CF\MainBundle\Form\MediaType;

class RegistrationAssociationFormType extends AbstractType{

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
            ->add('nomAsso', null, array('label' => "Nom de l'association : "))

            ->add('numWaldec', null, array('label' => "Numéro WALDEC : "))

            ->add('dateCreationAsso', null, array('label' => "Date de création : ",
                                                  'years' => range(date('Y')-100,date('Y')))
                                                  )

            ->add('ville', null, array('label' => "Ville : "))

            ->add('cp', null, array('label' => "Code postal : "))

            ->add('adresse', null, array('label' => "Adresse : "))

            ->add('telephone', null, array('label' => "Numéro de téléphone : "))

            ->add('descriptionAsso', null, array('label' => "Description : "))

            ->add('site', null, array('label' => "Site internet : "))

            ->add('facebook', null, array('label' => "Facebook : "))

            ->add('twitter', null, array('label' => "Twitter : "))

            ->add('googleplus', null, array('label' => "Google+ : "))

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