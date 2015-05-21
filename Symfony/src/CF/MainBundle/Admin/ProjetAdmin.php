<?php

namespace CF\MainBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class ProjetAdmin extends Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('nom')
            ->add('valider', null, array('label' => 'Validé'))
            ->add('description')
            ->add('dateCreation','date')
            ->add('dateFin','date')
            ->add('infoSup')
            ->add('association.nom', null, array('label' => 'Association'))
            ->add('nbDonateur')
        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('nom')
            ->add('association.nom', null, array('label' => 'Association'))
            ->add('dateCreation')
            ->add('dateFin')
            ->add('valider', null, array('label' => 'Validé'))
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('id')
            ->addIdentifier('nom')
            ->add('association.nom', null, array('label' => 'Association'))
            ->add('dateCreation')
            ->add('dateFin')
            ->add('valider', null, array('label' => 'Validé', 'editable' => true))
        ;
    }
}