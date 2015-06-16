<?php

namespace Athwela\AdministratorBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Athwela\EntityBundle\Entity\Admin;
use Athwela\DA\CRUD\Read;
use Athwela\DA\CRUD\Update;
use Symfony\Component\DependencyInjection\ContainerAware;

class AdminSettingsController extends Controller {

    public function indexAction() {
        $user = $this->container->get('security.context')->getToken()->getUser();
        $id = $user->getID();
        $entity = Read::getInstance()->read(new Admin(), 'admin', 'ID', $id);
        $mobiNo = Read::getInstance()->readSpecific('mobile_number','admin_mobile','a_ID',$id);
        return $this->container->get('templating')->renderResponse('AthwelaAdministratorBundle:Administrator:adminSettings.html.twig', array(
                    'entity' => $entity, 'mobiNo'=>$mobiNo
        ));
    }
    
    public function updatesAction() {
        
        $data = $this->getRequest()->request->all();
        $user = $this->container->get('security.context')->getToken()->getUser();
        $id = $user->getID();

        if (array_key_exists('fName', $data)) {
            Update::getInstance()->updateSpecific('admin', 'ID', $id, 'first_name', $data['fName']);
            Update::getInstance()->updateSpecific('admin', 'ID', $id, 'last_name', $data['lName']);
            Update::getInstance()->updateSpecific('admin', 'ID', $id, 'street', $data['street']);
            Update::getInstance()->updateSpecific('admin', 'ID', $id, 'city', $data['city']);
            Update::getInstance()->updateSpecific('admin', 'ID', $id, 'country', $data['country']);
            Update::getInstance()->updateSpecific('admin_mobile', 'a_ID', $id, 'mobile_number', $data['mobi']);
        }   
        
        $entity = Read::getInstance()->read(new Admin(), 'admin', 'ID', $id);
        $mobiNo = Read::getInstance()->readSpecific('mobile_number','admin_mobile','a_ID',$id);
        return $this->container->get('templating')->renderResponse('AthwelaAdministratorBundle:Administrator:adminSettings.html.twig', array(
                    'entity' => $entity, 'mobiNo'=>$mobiNo
        ));
    }

}
