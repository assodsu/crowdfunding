<?php

namespace CF\UserBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class ParticulierAdmin extends Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('pseudo')
            ->add('email')
            ->add('nom')
            ->add('prenom')
            ->add('benevole')
            ->add('sexe')
            ->add('adresse')
            ->add('ville')
            ->add('cp')
            ->add('telephone')
            ->add('site')
            ->add('facebook')
            ->add('twitter')
            ->add('googleplus')
            ->add('dateNaissance')
            ->add('roles')
            ->add('enabled', null, array('label' => 'Activé'))
        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('pseudo')
            ->add('nom')
            ->add('prenom')
            ->add('benevole')
            ->add('enabled', null, array('label' => 'Activé'))
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('pseudo')
            ->add('email')
            ->add('nom')
            ->add('prenom')
            ->add('benevole')
            ->add('enabled', null, array('label' => 'Activé'))
        ;
    }
}