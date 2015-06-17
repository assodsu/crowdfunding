<?php
//src CF\UserBundle\Form\Type\RegistrationFormType.php

namespace CF\UserBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

use CF\MainBundle\Form\MediaType;

class ProfileAssociationFormType extends AbstractType{

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
            ->add('email', 'email', array('label' => false))

            ->add('ville', null, array('label' => false))

            ->add('numWaldec', null, array('label' => false))

            ->add('dateCreationAsso', 'date', array('widget' => 'single_text', 'input' => 'datetime', 'format' => 'dd/MM/yyyy', 'attr' => array('class' => 'datepicker')))

            ->add('cp', null, array('label' => false))

            ->add('adresse', null, array('label' => false))

            ->add('telephone', null, array('label' => false))

            ->add('descriptionAsso', 'textarea', array('label' => false))

            ->add('site', null, array('label' => false))

            ->add('facebook', null, array('label' => false))

            ->add('twitter', null, array('label' => false))

            ->add('googleplus', null, array('label' => false))

            ->add('logo', new MediaType(), array('label' => false))
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
        return 'cf_user_profile';
    }

}