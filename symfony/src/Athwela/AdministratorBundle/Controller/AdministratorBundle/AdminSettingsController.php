<?php

namespace Athwela\AdministratorBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Athwela\EntityBundle\Entity\Admin;
use Athwela\DA\CRUD\Read;
use Symfony\Component\DependencyInjection\ContainerAware;

class AdminSettingsController extends ContainerAware {

    public function indexAction() {
        $user = $this->container->get('security.context')->getToken()->getUser();
        $email = $user->getEmail();
        $entity = Read::getInstance()->read(new Admin(), 'admin', 'email', $email);
        return $this->container->get('templating')->renderResponse('AthwelaAdministratorBundle:Administrator:adminSettings.html.twig', array(
                    'entity' => $entity
        ));
    }

}
