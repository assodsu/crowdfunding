<?php

namespace CF\MessageBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class MessageType extends AbstractType{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('content', null, array('label' => false, 
                'attr' => array(
                    'placeholder' => 'Entrez votre message...')
                ))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'CF\MessageBundle\Entity\Message'
        ));
    }

    public function getName()
    {
        return 'cf_message_message';
    }

}