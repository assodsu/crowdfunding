<?php

namespace CF\UserBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class EntrepriseAdmin extends Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('nomEntreprise')
            ->add('email')
            ->add('numSiret')
            ->add('adresse')
            ->add('ville')
            ->add('cp')
            ->add('telephone')
            ->add('site')
            ->add('facebook')
            ->add('twitter')
            ->add('googleplus')
            ->add('dateCreationEntreprise')
            ->add('roles')
            ->add('enabled', null, array('label' => 'Activé'))
        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('nomEntreprise')
            ->add('email')
            ->add('numSiret')
            ->add('enabled', null, array('label' => 'Activé'))
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('id')
            ->addIdentifier('nomEntreprise')
            ->add('email')
            ->add('numSiret')
            ->add('enabled', null, array('label' => 'Activé'))
        ;
    }
}