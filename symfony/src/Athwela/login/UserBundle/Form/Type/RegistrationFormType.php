<?php

namespace Athwela\login\UserBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class RegistrationFormType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        // add your custom field
        $builder->add('status', 'choice', array(
            'choices' => array('ROLE_ORG' => 'Organization', 'ROLE_VOL' => 'Volunteer'),
            'required' => true,
            'label'=>'Select your role'
        ))
        ;
    }

    public function getParent() {
        return 'fos_user_registration';
    }

    public function getName() {
        return 'athwela_user_registration';
    }

}
