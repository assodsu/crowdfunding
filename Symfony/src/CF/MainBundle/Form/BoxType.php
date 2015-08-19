<?php

namespace CF\MainBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

use CF\MainBundle\Form\MediaType;

class BoxType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre','text', array('label' => 'Titre','required'  => false, 'attr' => array('class' => 'form-control')))
            ->add('contenu','textarea', array('label' => 'Contenu','required'  => false,'attr' => array('class' => 'form-control', 'rows' => '5')))
            ->add('urlImage',new MediaType(), array('label' => 'Url image','required'  => false, 'attr' => array('class' => 'form-control')))
            ->add('urlVideo','text', array('label' => 'Url vidéo','required'  => false, 'attr' => array('class' => 'form-control')))
            ->add('fullWidth', 'checkbox', array('label' => 'Souhaitez-vous un seul bloc sur la ligne ?','required'  => false,'attr' => array('class' => 'form-control box-width')))
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
