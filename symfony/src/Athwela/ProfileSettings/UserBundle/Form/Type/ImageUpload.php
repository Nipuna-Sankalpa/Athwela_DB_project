<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Athwela\ProfileSettings\UserBundle\Form\Type;

/**
 * Description of ImageUpload
 *
 * @author Flash
 */
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\AbstractType;


class ImageUpload extends AbstractType{
    //put your code here
    public Function buildForm(FormBuilderInterface $builder,array $options){
        $builder->
                add('File','file');
    }
    
    public function setDefaultOptions(OptionsResolverInterface $resolver){
        $resolver->setDefaults(array('data_class'=>'Athwela\EntityBundle\Entity\Image'));
    }
    
    public function getName(){
        return 'Image_Uploader';
    }
    
}
