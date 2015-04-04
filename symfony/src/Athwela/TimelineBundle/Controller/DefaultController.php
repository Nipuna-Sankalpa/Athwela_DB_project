<?php

namespace Athwela\TimelineBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function viewTimelineAction(){
        return $this->render('AthwelaTimelineBundle:VolunteerTimeline:timeline.html.twig');
    }

    public function indexAction($name)
    {
        return $this->render('AthwelaTimelineBundle:Default:index.html.twig', array('name' => $name));
    }
}
