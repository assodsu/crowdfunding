<?php

namespace CF\UserBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class AssociationAdmin extends Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('nomAsso')
            ->add('email')
            ->add('numWaldec')
            ->add('adresse')
            ->add('ville')
            ->add('cp')
            ->add('telephone')
            ->add('site')
            ->add('facebook')
            ->add('twitter')
            ->add('googleplus')
            ->add('dateCreationAsso')
            ->add('descriptionAsso')
            ->add('roles')
            ->add('enabled', null, array('label' => 'Activé'))
        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('nomAsso')
            ->add('ville')
            ->add('email')
            ->add('numWaldec')
            ->add('enabled', null, array('label' => 'Activé'))
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('id')
            ->addIdentifier('nomAsso')
            ->add('ville')
            ->add('email')
            ->add('numWaldec')
            ->add('enabled', null, array('label' => 'Activé', 'editable' => true))
       ;
    }
}