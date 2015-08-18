<?php

namespace CF\MainBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

use CF\MainBundle\Form\MediaType;

class ProjetType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', null, array('label' => "nom du projet"))
            ->add('infoSup', 'textarea',  array('label' => "Informations supplémentaires", 'attr' => array('class' => 'ckeditor')))
            ->add('background', new MediaType(),  array('label' => "image de fond"))
            ->add('besoins', 'collection', array('label' => false,
                'type' => new BesoinsType(),
                'allow_add'    => true,
                'allow_delete' => true
                ))
            ->add('tags',  'entity', array(
                'class'    => 'CFMainBundle:Tags',
                'property' => 'nom',
                'expanded'=>true,
                'multiple' => true
                ))
            ->add('boxs', 'collection', array('label' => false,
                'type' => new BoxType(),
                'allow_add'    => true,
                'allow_delete' => true,
                'prototype' => true,
                'by_reference' => false,
                ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'CF\MainBundle\Entity\Projet'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'cf_mainbundle_projet';
    }
}
