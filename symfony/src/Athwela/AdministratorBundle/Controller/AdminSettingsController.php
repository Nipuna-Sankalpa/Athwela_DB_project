<?php

namespace Athwela\AdministratorBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AdminSettingsController extends Controller
{
    public function indexAction(){
        return $this->render('AthwelaAdministratorBundle:Administrator:adminSettings.html.twig');
        
    }
    
    
    
}
