<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of VolProfileController
 *
 * @author Mampitiya1
 */

namespace Athwela\OrgProfileBundle\Controller;

use Symfony\Component\DependencyInjection\ContainerAware;
use Athwela\EntityBundle\Entity\Volunteer;
use Athwela\EntityBundle\Entity\Organization;
use Athwela\EntityBundle\Entity\Project;
use Athwela\DA\CRUD\Read;
use Athwela\DA\CustomQuery\CustomQuery;
use Symfony\Component\HttpFoundation\Request;

class OrgProjectController extends ContainerAware {
    public function ongoingAction(Request $request){
        $user = $this->container->get('security.context')->getToken()->getUser();
        if ($request->getMethod() === 'GET' && $request->get('email') != NULL) {
            $email = $request->get('email');
        } else {
            $email = $user->getEmail();
        }        
        $entity = Read::getInstance()->read(new Organization(), 'organization', 'email', $email);
        $projects = $this->getProject($entity);        
        return $this->container->get('templating')->renderResponse('OrgProfileBundle:OrgProfile:ongoing.html.twig', array(
                    'entity' => $entity,
                    'projects' => $projects
        ));
    }
    
    public function postedAction(Request $request){
        $user = $this->container->get('security.context')->getToken()->getUser();
        if ($request->getMethod() === 'GET' && $request->get('email') != NULL) {
            $email = $request->get('email');
        } else {
            $email = $user->getEmail();
        }        
        $entity = Read::getInstance()->read(new Organization(), 'organization', 'email', $email);
        $projects = $this->getAllProject($entity);        
        return $this->container->get('templating')->renderResponse('OrgProfileBundle:OrgProfile:ongoing.html.twig', array(
                    'entity' => $entity,
                    'projects' => $projects
        ));
    }

    public function getProject($entity){
        $i = 0; $temp[][] = null;
        $projects = CustomQuery::getInstance()->customQuery('SELECT p.title, p.description, p.start_date, p.end_date, p.posted_date, p.volunteers_needed, p.no_of_filled_positions FROM `project` p where status = "ongoing" and p.o_ID = '.$entity->getId());
        while ($row = mysqli_fetch_row($projects)) {
            for ($index = 0; $index < count($row); $index++) {
                $temp[$i][$index] = $row[$index];
            }            
            $i++;
        }
        return $temp;
    }
    public function getAllProject($entity){
        $i = 0; $temp[][] = null;
        $projects = CustomQuery::getInstance()->customQuery('SELECT p.title, p.description, p.start_date, p.end_date, p.posted_date, p.volunteers_needed, p.no_of_filled_positions FROM project p where p.o_ID = '.$entity->getId());
        while ($row = mysqli_fetch_row($projects)) {
            for ($index = 0; $index < count($row); $index++) {
                $temp[$i][$index] = $row[$index];
            }            
            $i++;
        }
        return $temp;
    }    
}