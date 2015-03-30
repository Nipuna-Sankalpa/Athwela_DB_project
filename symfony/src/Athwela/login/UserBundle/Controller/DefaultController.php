<?php

namespace Athwela\login\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('AthwelaloginUserBundle:Default:index.html.twig');
    }
}
