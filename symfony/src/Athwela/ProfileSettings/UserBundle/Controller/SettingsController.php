<?php

namespace Athwela\ProfileSettings\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SettingsController extends Controller
{
    public function settingsAction($id){
        return $this->render('AthwelaProfileSettingsUserBundle:Settings:ProfileSettings.html.twig', array('name' => $id));
    }
}
