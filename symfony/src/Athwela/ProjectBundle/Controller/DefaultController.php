<?php

namespace Athwela\ProjectBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('AthwelaProjectBundle:Project:profile.html.twig');
    }
}
