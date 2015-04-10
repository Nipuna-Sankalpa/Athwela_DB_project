<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Athwela\OrgProfileBundle\Controller;

use Symfony\Component\DependencyInjection\ContainerAware;
use Athwela\EntityBundle\Entity\Volunteer;
use Athwela\EntityBundle\Entity\Project;
use Athwela\EntityBundle\Entity\Organization;
use Athwela\EntityBundle\Entity\Admin;
use Athwela\DA\CRUD\Read;
use Athwela\DA\CRUD\Create;
use Athwela\DA\CustomQuery\CustomQuery;
use Symfony\Component\HttpFoundation\Request;

class OrgProfileController extends ContainerAware
{
    public function showAction($id)
    {
        $entity = Read::getInstance()->read(new Organization(), 'organization', 'ID', $id);
        $fax = Read::getInstance()->readMul($id, '1', 'organization_fax');
        $email = Read::getInstance()->readMul($id, '1', 'organization_email');
        $mobile = Read::getInstance()->readMul($id, '1', 'organization_mobile');
        return $this->container->get('templating')->renderResponse('OrgProfileBundle:OrgProfile:show.html.twig', array(
                    'entity' => $entity,
                    'fax' => $fax,
                    'email' => $email,
                    'mobile' => $mobile,
        ));
    }
    
    public function notificationAction($id){
        $entity = Read::getInstance()->read(new Organization(), 'organization', 'ID', $id);
        return $this->container->get('templating')->renderResponse('OrgProfileBundle:OrgProfile:notification.html.twig', array(
            'entity' => $entity,
            ));
    }
}
