<?php

namespace Athwela\AdministratorBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('AthwelaAdministratorBundle:Default:index.html.twig');
    }
}