<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Athwela\OrgProfileBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Athwela\DA\CRUD\Read;
use Athwela\DA\DBConnection;
use Athwela\EntityBundle\Entity\Organization;

class OrgProfileController extends Controller
{
    public function showAction($id)
    {
        $conn = DBConnection::getInstance()->openConnection('localhost', 'root', 'dilini', 'athwela1');
        $entity = Read::getInstance()->read($conn, new Organization(), 'organization', 'ID', $id);
        $fax = Read::getInstance()->readMul($conn, $id, '1', 'organization_fax');
        $email = Read::getInstance()->readMul($conn, $id, '1', 'organization_email');
        $mobile = Read::getInstance()->readMul($conn, $id, '1', 'organization_mobile');
        DBConnection::getInstance()->closeConnection($conn);
        return $this->render('OrgProfileBundle:OrgProfile:show.html.twig', array(
                    'entity' => $entity,
                    'fax' => $fax,
                    'email' => $email,
                    'mobile' => $mobile,
        ));
    }
}
