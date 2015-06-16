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

namespace Athwela\VolProfileBundle\Controller;

use Symfony\Component\DependencyInjection\ContainerAware;
use Athwela\EntityBundle\Entity\Volunteer;
use Athwela\EntityBundle\Entity\Organization;
use Athwela\EntityBundle\Entity\Project;
use Athwela\DA\CRUD\Read;
use Athwela\DA\CustomQuery\CustomQuery;
use Symfony\Component\HttpFoundation\Request;

class VolProjectsController extends ContainerAware {
    public function ongoingAction(Request $request){
        $user = $this->container->get('security.context')->getToken()->getUser();
        if ($request->getMethod() === 'GET' && $request->get('email') != NULL) {
            $email = $request->get('email');
        } else {
            $email = $user->getEmail();
        }        
        $entity = Read::getInstance()->read(new Volunteer(), 'volunteer', 'email', $email);
        $projects = $this->getProject($entity); 
        $suggestions = $this->getSuggestions($entity);
        return $this->container->get('templating')->renderResponse('VolProfileBundle:VolProfile:ongoing.html.twig', array(
                    'entity' => $entity,
                    'projects' => $projects,
                    'suggesstion' => $suggestions
        ));
    }
    
    public function getProject($entity){
        $i = 0; $temp[][] = null;
        $projects = CustomQuery::getInstance()->customQuery('select p.title, p.description, p.start_date, p.end_date, p.posted_date, p.organization_ID, vp.contribution, p.ID from project p, volunteer_project vp, organization o where vp.project_ID = p.ID and p.organization_ID = o.ID and p.status = "ongoing" and vp.volunteer_ID = '.$entity->getId());
        while ($row = mysqli_fetch_row($projects)) {
            for ($index = 0; $index < count($row); $index++) {
                $temp[$i][$index] = $row[$index];
            }
            $temp[$i][5] = Read::getInstance()->read(new Organization(), 'organization', 'ID', $row[5]);
            CustomQuery::getInstance()->customQuery('Update volunteer_project set status = "Seen" where project_ID = '.$row[7].' and volunteer_ID = ' . $entity->getId() . ' and accepted_at = "' . $row[2] . '"');
            $i++;
        }
        return $temp;
    }
    
    public function getContribution($entity){
        $i = 0; $temp[][] = null;
        $contribution = CustomQuery::getInstance()->customQuery('select project_ID, contribution, p.organization_ID from volunteer_project vp, project p where p.ID = vp.project_ID and vp.volunteer_ID = '.$entity->getId());
        while ($row = mysqli_fetch_row($contribution)) {
            for ($index = 0; $index < count($row); $index++) {
                $temp[$i][$index] = $row[$index];
            }
            $temp[$i][0] = Read::getInstance()->read(new Project(), 'project', 'ID', $row[0]);            
            $temp[$i][2] = Read::getInstance()->read(new Organization(), 'organization', 'ID', $row[2]);            
            $i++;
        }
        return $temp;
    }
    
    public function contributionAction(Request $request){
        $user = $this->container->get('security.context')->getToken()->getUser();
        if ($request->getMethod() === 'GET' && $request->get('email') != NULL) {
            $email = $request->get('email');
        } else {
            $email = $user->getEmail();
        }        
        $entity = Read::getInstance()->read(new Volunteer(), 'volunteer', 'email', $email);
        $contri = $this->getContribution($entity);
        $suggestions = $this->getSuggestions($entity);
        return $this->container->get('templating')->renderResponse('VolProfileBundle:VolProfile:contribution.html.twig', array(
                    'entity' => $entity,
                    'contribution' => $contri,
                    'suggesstion' => $suggestions
        ));
    }
    
    public function getSuggestions($entity){
        $i = 0; $temp[] = null;
        $contribution = CustomQuery::getInstance()->customQuery('SELECT project_ID FROM suggestions where volunteer_ID = '.$entity->getId());
        while ($row = mysqli_fetch_row($contribution)) {            
            $temp[$i] = Read::getInstance()->read(new Project(), 'project', 'ID', $row[0]);        
            $i++;
        }
        return $temp;
    }
}
