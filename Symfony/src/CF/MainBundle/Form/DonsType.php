<?php

namespace CF\MainBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormEvent;
use Doctrine\ORM\EntityRepository;

use CF\MainBundle\Entity\Projet;

class DonsType extends AbstractType
{

    private $projet;

    public function __construct(Projet $projet)
    {
        $this->projet = $projet;
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('besoin', 'entity', array(
                'class' => 'CFMainBundle:Besoins',
                'query_builder' => function(EntityRepository $er) {
                    return $er->createQueryBuilder('b')
                    ->Where('b.projet = :id')
                    ->setParameter('id', $this->projet->getId());
                },
                'attr' => array('class' => 'styled-select body-besoin'),
                'label' => false
            ))
            ->add('quantite', null, array(
                'label' => false,
                'attr' => array('class'=>'styled-input')
            ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'CF\MainBundle\Entity\Dons'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'cf_mainbundle_dons';
    }
}
