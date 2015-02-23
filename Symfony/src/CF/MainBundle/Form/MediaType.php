<?php

namespace CF\MainBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class MediaType extends AbstractType{

	public function buildForm(FormBuilderInterface $builder, array $options){
        $builder
            ->add('file');
	}

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'CF\MainBundle\Entity\Media'
        ));
    }

    public function getName()
    {
        return 'cf_mainbundle_media';
    }

}