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
            ->add('nom')
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
            ->add('badges')
            ->add('projetsSuivis')
            ->add('certified', null, array('label' => 'Certifié'))
            ->add('enabled', null, array('label' => 'Activé'))
        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('nom')
            ->add('ville')
            ->add('email')
            ->add('numWaldec')
            ->add('certified', null, array('label' => 'Certifié'))
            ->add('enabled', null, array('label' => 'Activé'))
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('id')
            ->addIdentifier('nom')
            ->add('ville')
            ->add('email')
            ->add('numWaldec')
            ->add('certified', null, array('label' => 'Certifié', 'editable' => true))
            ->add('enabled', null, array('label' => 'Activé', 'editable' => true))
       ;
    }
}