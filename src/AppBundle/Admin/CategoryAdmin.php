<?php

// src/AppBundle/Admin/CategoryAdmin.php
namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class CategoryAdmin extends AbstractAdmin
{
    protected $baseRouteName = 'sonata_category';
    
    protected function configureFormFields(FormMapper $formMapper)
    {
        

        $formMapper->add('name', 'text');
                /*
                   ->add('user', 'entity', array(
                            'class' => 'Application\Sonata\UserBundle\Entity\User',
                            'property' => 'username ',
                        ))
                */
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('name');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('name');
    }
    
    /**
     * {@inheritdoc}
     */
    public function prePersist($object)
    {

        $user = $this->getConfigurationPool()->getContainer()->get('security.token_storage')->getToken()->getUser();
        $object->setUser($user);
    }
    
    /**
     * {@inheritdoc}
     */
    public function preUpdate($object)
    {
        $user = $this->getConfigurationPool()->getContainer()->get('security.token_storage')->getToken()->getUser();
        $object->setUser($user);
    }
}
