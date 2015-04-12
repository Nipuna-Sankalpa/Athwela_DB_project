<?php
/**
 * Created by PhpStorm.
 * User: Pubudu
 * Date: 4/11/2015
 * Time: 12:42 AM
 */

namespace Athwela\TimelineBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Athwela\TimelineBundle\Queries\TimelineQueryBuilder;

class TimelineController extends Controller {

    public function indexAction(Request $request) {
        return $this -> render('AthwelaTimelineBundle:VolunteerTimeline:timeline.html.twig', array(
                        'projects' => $this -> getAvailableProjects()
        ));
    }

    private function getAvailableProjects() {
        $qbuilder = new TimelineQueryBuilder();
        $projects = $qbuilder -> getAvailableProjects();

        return $projects;
    }
}