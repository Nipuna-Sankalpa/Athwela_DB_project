<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Athwela\OrgProfileBundle\Controller;

use Symfony\Component\DependencyInjection\ContainerAware;
use Athwela\EntityBundle\Entity\Organization;
use Athwela\DA\CRUD\Read;
use Athwela\DA\CustomQuery\CustomQuery;
use Symfony\Component\HttpFoundation\Request;

class OrgProfileController extends ContainerAware {

    public function showAction(Request $request) {
        $user = $this->container->get('security.context')->getToken()->getUser();
        if ($request->getMethod() === 'GET' && $request->get('email') != NULL) {
            $email = $request->get('email');
        } else {
            $email = $user->getEmail();
        }

        $entity = Read::getInstance()->read(new Organization(), 'organization', 'email', $email);
        $fax = Read::getInstance()->readMul($entity->getId(), $entity->getId(), 'organization_fax');
        $notific = $this->getNotificationCount($entity);
        $mobile = Read::getInstance()->readMul($entity->getId(), $entity->getId(), 'organization_mobile');

        $query = "SELECT image FROM organization WHERE email=" . "'" . $email . "'";
        $result = CustomQuery::getInstance()->customQuery($query);
        $proImg = null;

        if ($result) {
            while ($row = mysqli_fetch_row($result)) {
                $proImg = $row[0];
            }
        }


        return $this->container->get('templating')->renderResponse('OrgProfileBundle:OrgProfile:show.html.twig', array(
                    'entity' => $entity,
                    'amount' => $notific,
                    'fax' => $fax,
                    'proImg' => $proImg,
                    'mobile' => $mobile
        ));
    }

    public function getNotificationCount($entity) {
        $temp = 0;
        $notification1 = CustomQuery::getInstance()->customQuery('SELECT count(*) FROM admin_org_messages where msgStatus = "notRead" and organization_ID = ' . $entity->getId());
        while ($row = mysqli_fetch_row($notification1)) {
            $temp = $row[0];
        }
        return $temp;
    }

}
