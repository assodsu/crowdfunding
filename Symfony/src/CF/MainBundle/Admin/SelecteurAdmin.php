<?php

namespace CF\MainBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class SelecteurAdmin extends Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('texte')
            ->add('couleur')
            ->add('colonne')
            ->add('ordre')
            ->add('type', 'choice', array(
                'choices'   => array(1 => 'Accueil', 2 => 'Les projets'),
                'required'  => true,
            ));
        
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('texte')
            ->add('couleur')
            ->add('colonne')
            ->add('ordre')
            ->add('type')
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('id')
            ->addIdentifier('texte')
            ->add('couleur')
            ->add('colonne')
            ->add('ordre')
            ->add('type')
        ;
    }
}