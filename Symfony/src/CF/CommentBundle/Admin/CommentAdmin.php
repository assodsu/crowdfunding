<?php

namespace CF\CommentBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class CommentAdmin extends Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('moderate')
            ->add('content')
            ->add('report')
        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('moderate', null, array('label'=>'Modéré'))
            ->add('report', null, array('label'=>'Signalement'))
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('id')
            ->add('user.nom', 'entity', array('label'=>'Utilisateur'))
            ->add('moderate', null, array('label'=>'Modéré' , 'editable' => true))
            ->add('content', null, array('label'=>'Commentaire'))
            ->add('report', null, array('label'=>'Signalement'))
        ;
    }
}