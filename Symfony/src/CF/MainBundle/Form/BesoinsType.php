<?php

namespace CF\MainBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class BesoinsType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('type', 'choice', array(
                    'choices'   => array('benevole' => 'Bénévole', 'materiel' => 'Matériel', 'communication' => 'Communication'),
                    'required'  => true,
                    'attr' => array('class' => 'styled-input body-besoin'),
                    'label' => false
                ))
            ->add('ressource', 'text', array('label' => false, 'attr' => array('class' => 'styled-input', 'placeholder' => 'Nom de la ressource')))
            ->add('quantiteDemande', null ,array('label' => false, 'attr' => array('class' => 'styled-input', 'placeholder' => 'Quantité')))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'CF\MainBundle\Entity\Besoins'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'cf_mainbundle_besoins';
    }
}
