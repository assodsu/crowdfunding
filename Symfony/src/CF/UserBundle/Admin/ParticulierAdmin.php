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
            ->add('nom')
            ->add('email')
            ->add('name')
            ->add('firstname')
            ->add('benevole', null, array('required' => false))
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
            ->add('nom')
            ->add('name')
            ->add('firstname')
            ->add('benevole')
            ->add('enabled', null, array('label' => 'Activé'))
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('nom')
            ->add('email')
            ->add('name')
            ->add('firstname')
            ->add('benevole')
            ->add('enabled', null, array('label' => 'Activé', 'editable' => true))
        ;
    }
}