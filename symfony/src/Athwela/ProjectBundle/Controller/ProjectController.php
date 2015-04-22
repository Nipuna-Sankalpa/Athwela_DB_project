<?php

namespace Athwela\ProjectBundle\Controller;

use Symfony\Component\DependencyInjection\ContainerAware;
use Athwela\DA\CRUD\Read;
use Athwela\DA\CustomQuery\CustomQuery;
use Athwela\EntityBundle\Entity\Project;
use Athwela\EntityBundle\Entity\Organization;
use Athwela\ProjectBundle\Entity\ProjectSkill;
use Athwela\ProjectBundle\Entity\ProjectType;
use Athwela\ProjectBundle\Entity\ProjectImg;

class ProjectController extends ContainerAware {

    public function showProjectAction($ID) {
        $user = $this->container->get('security.context')->getToken()->getUser();
        $flag = NULL;
        $skill = NULL;
        $type = NULL;
        $img = NULL;
        $duration = NULL;
        
        $project = Read::getInstance()->read(new Project(), 'project', 'ID', $ID);
        $querySkill = "SELECT * FROM `project_skill`,`skill` where project_skill.s_ID=skill.ID and project_skill.p_ID='$ID'";
        $queryType = "SELECT project.t_ID as t_ID,project.ID as p_ID,type.name,type.description FROM type,project where type.ID=project.t_ID and project.ID='$ID'";
        $queryImg = "SELECT * FROM project_img where p_ID='$ID'";
        $customQuery = "SELECT DATEDIFF(end_date,start_date) from project where ID='$ID'";
        $queryOrg = "select organization.ID,organization.name,organization.email from organization,project where project.o_ID='" . $project->getO_ID() . "'";
        
        $resultSkill = CustomQuery::getInstance()->customQuery($querySkill);
        $resultType = CustomQuery::getInstance()->customQuery($queryType);
        $resultImg = CustomQuery::getInstance()->customQuery($queryImg);
        $resultOrg = CustomQuery::getInstance()->customQuery($queryOrg);
        $CustomResult = CustomQuery::getInstance()->customQuery($customQuery);
        $role = $user->getRoles();

        if ($resultSkill) {
            $i = 0;
            while ($row = mysqli_fetch_row($resultSkill)) {
                $skill[$i] = new ProjectSkill();
                $skill[$i]->setID($row[2]);
                $skill[$i]->setName($row[3]);
                $skill[$i]->setDescription($row[4]);
                $i++;
            }
        }

        if ($resultImg) {
            $i = 0;
            while ($row = mysqli_fetch_row($resultImg)) {
                $img[$i] = new ProjectImg();
                $img[$i]->setID($row[0]);
                $img[$i]->setURL($row[1]);
                $img[$i]->setCode($row[2]);
                $i++;
            }
        }

        if ($resultType) {
            while ($row = mysqli_fetch_row($resultType)) {
                $type = new ProjectType();
                $type->setT_ID($row[0]);
                $type->setP_ID($row[1]);
                $type->setName($row[2]);
                $type->setDescription($row[3]);
            }
        }
        if ($CustomResult) {
            while ($row = mysqli_fetch_row($CustomResult)) {
                $duration = $row[0];
            }
        }
        if ($resultOrg) {
            while ($row = mysqli_fetch_row($resultOrg)) {
                $org = new Organization();
                $org->setID($row[0]);
                $org->setName($row[1]);
                $org->setEmail($row[2]);
            }
        }

        if ($role) {
            if ($role[0] == "ROLE_ORG") {
                $flag = TRUE;
            } else {
                $flag = FALSE;
            }
        } else {
            die('you are not authorized to view this page');
        }


        return $this->container->get('templating')->renderResponse('AthwelaProjectBundle:Project:profile.html.twig', array(
                    'project' => $project,
                    'flag' => $flag,
                    'img' => $img,
                    'skills' => $skill,
                    'type' => $type,
                    'org' => $org,
                    'duration' => $duration,
        ));
    }

}
