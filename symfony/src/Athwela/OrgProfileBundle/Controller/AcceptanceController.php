<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Athwela\OrgProfileBundle\Controller;

use Symfony\Component\DependencyInjection\ContainerAware;
use Athwela\DA\CRUD\Read;
use Athwela\EntityBundle\Entity\Organization;
use Athwela\EntityBundle\Entity\Project;
use Athwela\EntityBundle\Entity\Volunteer;
use Athwela\DA\CustomQuery\CustomQuery;
use Symfony\Component\HttpFoundation\Request;

class AcceptanceController extends ContainerAware {

    public function acceptAction(Request $request) {
        $user = $this->container->get('security.context')->getToken()->getUser();
        if ($request->getMethod() === 'GET' && $request->get('email') != NULL) {
            $email = $request->get('email');
        } else {
            $email = $user->getEmail();
        }

        $entity = Read::getInstance()->read(new Organization(), 'organization', 'email', $email);
        $requests = $this->getRequests($entity->getId());
        return $this->container->get('templating')->renderResponse('OrgProfileBundle:OrgProfile:acceptance.html.twig', array(
                    'requests' => $requests,
                    'entity' => $entity
        ));
    }

    public function acceptedAction(Request $request, $ID) {
        if ($request->getMethod() === 'GET' && $request->get('contribution') != NULL) {
            $contri = $request->get('contribution');
        }
        CustomQuery::getInstance()->customQuery('Update volunteer_project set accepted_at = ' . date('Y-m-d h:i:s') . 'and contribution = ' . $contri);

        $requests = $this->getRequests($ID);
        return $this->container->get('templating')->renderResponse('OrgProfileBundle:OrgProfile:acceptance.html.twig', array('requests' => $requests));
    }

    public function rejectedAction(Request $request, $ID) {
        if ($request->getMethod() === 'GET' && $request->get('contribution') == NULL) {
            $id = $request->get('volunteer_id');
            $project = $request->get('project_id');
        }
        CustomQuery::getInstance()->customQuery('delete from volunteer_project where volunteer_ID = ' . $id . ' and project_ID = ' . $project);
        $requests = $this->getRequests($ID);
        return $this->container->get('templating')->renderResponse('OrgProfileBundle:OrgProfile:acceptance.html.twig', array('requests' => $requests));
    }

    public function getRequests($ID) {
        $i = 0;
        $temp[][] = null;
        $projects = CustomQuery::getInstance()->customQuery('select ID, vp.volunteer_ID from project, volunteer_project vp where vp.project_ID = project.ID and accepted_at is null and project.organization_ID = ' . $ID);
        while ($row = mysqli_fetch_row($projects)) {
            for ($index = 0; $index < count($row); $index++) {
                $temp[$i][$index] = $row[$index];
            }
            $temp[$i][0] = Read::getInstance()->read(new Project(), 'project', 'ID', $row[0]);
            $temp[$i][1] = Read::getInstance()->read(new Volunteer(), 'volunteer', 'ID', $row[1]);
            $i++;
        }
        return $temp;
    }

}
