<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of VolProfileController
 *
 * @author Mampitiya1
 */

namespace Athwela\OrgProfileBundle\Controller;

use Symfony\Component\DependencyInjection\ContainerAware;
use Athwela\EntityBundle\Entity\Organization;
use Athwela\DA\CRUD\Read;
use Athwela\DA\CRUD\Create;
use Athwela\DA\CustomQuery\CustomQuery;
use Symfony\Component\HttpFoundation\Request;

class OrgNotificationController extends ContainerAware {

    public function notificationAction($email) {
        $entity = Read::getInstance()->read(new Organization(), 'organization', 'email', $email);
        $notific = $this->getNotificationCount($entity);
        $messages = $this->getMessages($entity);
        return $this->container->get('templating')->renderResponse('OrgProfileBundle:OrgProfile:notification.html.twig', array(
                    'entity' => $entity,
                    'amount' => $notific,
                    'messages' => $messages
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
    
    public function getMessages($entity) {
        $i = 0;
        $messages[][] = null;
        $message = CustomQuery::getInstance()->customQuery('SELECT * FROM admin_org_messages where msgStatus = "notRead" and organization_ID = ' . $entity->getId());
        while ($row = mysqli_fetch_row($message)) {
            for ($index = 0; $index < count($row); $index++) {
                $messages[$i][$index] = $row[$index];
            }            
            CustomQuery::getInstance()->customQuery('Update admin_org_messages set msgStatus = "Read" where organization_ID = ' . $entity->getId() . ' and sent_time = "' . $row[2] . '"');
            $i++;
        }
        return $messages;
    }
    
    public function messageAction($email) {
        $entity = Read::getInstance()->read(new Organization(), 'organization', 'email', $email);
        $sent = null;
        return $this->container->get('templating')->renderResponse('OrgProfileBundle:OrgProfile:message.html.twig', array(
                    'entity' => $entity,
                    'sent' => $sent
        ));
    }    
    
    public function messagesendAction(Request $request, $email) {
        if ($request->getMethod() == "POST") {
            $entity = Read::getInstance()->read(new Organization(), 'organization', 'email', $email);
            $message[] = null;
            $message[0] = $entity->getId();
            $message[1] = $request->get('message');
            $message[2] = date('Y-m-d h:i:s');
            $message[3] = 'notRead';
            $sent = Create::getInstance()->create($message, 'org_admin_msg');
            return $this->container->get('templating')->renderResponse('OrgProfileBundle:OrgProfile:message.html.twig', array('entity' => $entity, 'sent' => $sent));
        }
    }
}
