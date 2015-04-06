<?php

namespace Athwela\OrgProfileBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('OrgProfileBundle:Default:index.html.twig', array('name' => $name));
    }
}
