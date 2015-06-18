<?php

namespace CF\MainBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class BoxType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre','text', array('label' => 'Titre', 'attr' => array('class' => 'form-control')))
            ->add('contenu','textarea', array('label' => 'Contenu','attr' => array('class' => 'form-control', 'rows' => '5')))
            ->add('urlImage','text', array('label' => 'Url image', 'attr' => array('class' => 'form-control')))
            ->add('urlVideo','text', array('label' => 'Url vidéo', 'attr' => array('class' => 'form-control')))
            ->add('fullWidth', 'checkbox', array('label' => 'Un bloc','attr' => array('class' => 'form-control box-width')))
            ->add('ordre',null, array('label' => 'Ordre','attr' => array('class' => 'form-control box-order')))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'CF\MainBundle\Entity\Box'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'cf_mainbundle_box';
    }
}
