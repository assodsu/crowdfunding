<?php

namespace CF\MainBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

use CF\MainBundle\Form\MediaType;

class ProjetEditType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', null, array('label' => "nom du projet"))
            ->add('tags',  'entity', array(
                'class'    => 'CFMainBundle:Tags',
                'property' => 'nom',
                'expanded'=>true,
                'multiple' => true
                ))
            ->add('infoSup', 'textarea',  array('label' => false, 'attr' => array('class' => 'ckeditor')))
            ->add('background', new MediaType(),  array('label' => false, 'attr' => array('class' => 'file')))
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
        return 'cf_mainbundle_projetedit';
    }
}
