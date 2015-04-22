<?php

namespace Athwela\VolProfileBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('VolProfileBundle:Default:show.html.twig');
    }
}
