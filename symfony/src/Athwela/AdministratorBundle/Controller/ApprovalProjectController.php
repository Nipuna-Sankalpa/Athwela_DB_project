<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Athwela\AdministratorBundle\Controller;

use Symfony\Component\DependencyInjection\ContainerAware;
use Athwela\DA\DBConnection;
use Athwela\DA\CRUD\Update;
use Athwela\DA\CRUD\Delete;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Athwela\EntityBundle\Entity\Project;
use Athwela\EntityBundle\Entity\Type;
use Athwela\AdministratorBundle\Entity\ProjectView;
use Athwela\DA\CustomQuery\CustomQuery;
use Symfony\Component\HttpFoundation\Request;

/**
 * Description of ApprovalProjectController
 *
 * @author Yellow Flash
 */
class ApprovalProjectController extends ContainerAware {

    public function adminProjectAction(Request $request) {

        $query = "SELECT title,ID,posted_date FROM project WHERE status=" . "'" . "pending" . "'";
        $query1 = "SELECT name FROM type";
        $result = CustomQuery::getInstance()->customQuery($query);
        $result1 = CustomQuery::getInstance()->customQuery($query1);
        $i = 0;
        $newProjects = NULL;
        $allProjects = NULL;
        $searchProjects = NULL;
        $types = NULL;


        if ($result) {
            while ($row = mysqli_fetch_row($result)) {
                $newProjects[$i] = new Project();
                $newProjects[$i]->setTitle($row[0]);
                $newProjects[$i]->setId($row[1]);
                $newProjects[$i]->setPostedDate($row[2]);

                $i++;
            }
        } else {
            die('Error');
        }

        if ($request->getMethod() === 'GET' && $request->get('flag')) {
            $query = "SELECT title,org_Name,project_Status FROM projectview";
            $result = CustomQuery::getInstance()->customQuery($query);
            $i = 0;

            if ($result) {
                while ($row = mysqli_fetch_row($result)) {
                    $allProjects[$i] = new ProjectView();
                    $allProjects[$i]->seTitle($row[0]);
                    $allProjects[$i]->setsetOrg_name($row[1]);
                    $allProjects[$i]->setProject_status($row[2]);
                    $i++;
                }
            } else {
                die('Error');
            }
        }


        if ($result1) {
            while ($row = mysqli_fetch_row($result1)) {
                $types[$i] = new Type();
                $types[$i]->setName($row[0]);
                $i++;
            }
        } else {
            die('Error');
        }


        if ($request->getMethod() === 'GET' && $request->get('query') != NULL) {
            $query = $request->get('query');

            $result = CustomQuery::getInstance()->customQuery($query);
            $i = 0;
            if ($result) {
                while ($row = mysqli_fetch_row($result)) {
                    $searchProjects[$i] = new ProjectView();
                    $searchProjects[$i]->setTitle($row[0]);
                    $searchProjects[$i]->setOrg_name($row[1]);
                    $searchProjects[$i]->setProject_status($row[2]);

                    $i++;
                }
            } else {
                die('Error Occured');
            }
        }

        return $this->container->get('templating')->renderResponse('AthwelaAdministratorBundle:Administrator:Project.html.twig', array(
                    'newProjects' => $newProjects,
                    'allProjects' => $allProjects,
                    'searchProjects' => $searchProjects,
                    'types' => $types,
        ));
    }

    public function searchProjectAction(Request $request) {
        $projectType = null;
        $projectName = null;
        $orgName = null;
        $queryTemp = null;

        $query = "SELECT title,org_Name,project_Status FROM projectview WHERE ";
        if ($request->getMethod() === 'POST') {
            $orgName = $request->get('orgName');
            $projectType = $request->get('projectType');
            $projectName = $request->get('projectName');
        }

        if ($orgName) {
            $queryTemp.="and org_Name like " . "'" . "%$projectName%" . "' ";
        }
        if ($projectType) {
            $queryTemp.="and project_type =" . "'" . $projectType . "' ";
        }
        if ($projectName) {
            $queryTemp.="and title like " . "'" ." %$projectName% ". "' ";
        }

        $queryTemp1 = substr_replace($queryTemp, " ", 0, 3);

        $query.=$queryTemp1;

        $url = $this->container->get('router')->generate('athwela_administrator_project', array('query' => $query));
        return new RedirectResponse($url);
    }

    public function approveProjectAction($id) {
        $conn = DBConnection::getInstance()->getConnection();
        $temp = Update::getInstance()->update($conn, 'project', 'ID', $id, array('status'), array('approved'));
        if ($temp) {
            $url = $this->container->get('router')->generate('athwela_administrator_project');
            return new RedirectResponse($url);
        } else {
            die('Task Incompleted');
        }
    }

    public function rejectProjectAction($id) {
        $conn = DBConnection::getInstance()->getConnection();
        $temp = Delete::getInstance()->deleteRow($conn, 'project', 'ID', $id);
        if ($temp) {
            $url = $this->container->get('router')->generate('athwela_administrator_project');
            return new RedirectResponse($url);
        } else {
            die('Task Incompleted');
        }
    }

}
