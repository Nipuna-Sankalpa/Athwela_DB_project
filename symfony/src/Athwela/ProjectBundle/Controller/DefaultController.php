<?php

namespace Athwela\ProjectBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Athwela\DA\CustomQuery\StoreImages;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller {

    public function indexAction(Request $request) {
        
     
        return $this->render('AthwelaProjectBundle:Default:index.html.twig');
    }

}
