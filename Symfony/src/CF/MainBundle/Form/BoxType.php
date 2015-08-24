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
            ->add('titre','text', array('label' => false, 'attr' => array('placeholder' => 'Titre du bloc')))
            ->add('contenu','textarea', array('label' => false,'required'  => false, 'attr' => array('class' => 'ckeditor')))
            ->add('urlImage',new MediaType(), array('label' => false,'required'  => false))
            ->add('urlVideo','text', array('label' => false,'required'  => false, 'attr' => array('placeholder' => 'Entrez l\'url de la vidéo (ex : http://youtube.com/watch?v=code)')))
            ->add('fullWidth', 'choice', array('label' => false,'expanded' => true,'choices' => array('0' => '1 colonne', '1' => '2 colonnes')))
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
