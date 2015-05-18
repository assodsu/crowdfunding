<?php

namespace CF\NotificationBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

use CF\NotificationBundle\Entity\Notification;

class NotificationAdmin extends Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('contenu')
            ->add('type', 'choice', array(
                'choices' => array(1 => 'Message', 2 => 'Projets')))
            ->add('user')

            ->add('vu')
        ;
        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('contenu')
            ->add('type')
            ->add('user')
            ->add('vu')
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('id')
            ->addIdentifier('contenu')
            ->add('type')
            ->add('user')
            
            ->add('vu')
        ;
    }
}