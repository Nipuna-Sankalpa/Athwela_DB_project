<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Athwela\ProjectBundle\Form;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\AbstractType;


/**
 * Description of OrganizationType
 *
 * @author Flash
 */
class ProfileType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('title', 'text', array(
                    'label' => 'Project Title',
                    'required' => TRUE,
        ));
        $builder
                ->add('startDate', 'date', array(
                    'label' => 'Start Date',
                    'placeholder' => array('year' => 'Year', 'month' => 'Month', 'day' => 'Day'),
                    'required' => TRUE
        ));
        $builder
                ->add('endDate', 'date', array(
                    'label' => 'End Date',
                    'placeholder' => array('year' => 'Year', 'month' => 'Month', 'day' => 'Day'),
                    'required' => FALSE
        ));
        $builder
                ->add('description', 'textarea', array(
                    'label' => 'Description',
                    'required' => TRUE
        ));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array('data_class' => 'Athwela\EntityBundle\Entity\Project'));
    }

    public function getName() {
        return 'profile_form';
    }

}
