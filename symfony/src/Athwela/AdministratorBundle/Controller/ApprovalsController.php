<?php

namespace Athwela\AdministratorBundle\Controller;

use Symfony\Component\DependencyInjection\ContainerAware;
use Athwela\DA\DBConnection;
use Athwela\DA\CRUD\Read;
use Athwela\DA\CRUD\Update;
use Athwela\DA\CRUD\Delete;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Athwela\EntityBundle\Entity\Admin;
use Athwela\EntityBundle\Entity\Volunteer;
use Athwela\EntityBundle\Entity\Skill;
use Athwela\DA\CustomQuery\CustomQuery;
use Symfony\Component\HttpFoundation\Request;
use Athwela\AdministratorBundle\Entity\SearchVol;

class ApprovalsController extends ContainerAware {

    public function adminDashAction() {

        $user = $this->container->get('security.context')->getToken()->getUser();
        $email = $user->getEmail();
        $userName = $user->getUsername();

        $conn = DBConnection::getInstance()->getConnection();
        $object = Read::getInstance()->read($conn, new Admin(), 'admin', 'email', $email);
        if ($object === NULL) {
            die($conn->error);
        }
        $messages = $this->getNewMessages();
        $projects = $this->getNewProjects();
        $organizations = $this->getNewOrganizations();
        $volunteers = $this->getNewVolunteers();

        return $this->container->get('templating')->renderResponse('AthwelaAdministratorBundle:Administrator:adminDashBoard.html.twig', array(
                    'user' => $object,
                    'userName' => $userName,
                    'messages' => $messages,
                    'projects' => $projects,
                    'organizations' => $organizations,
                    'volunteers' => $volunteers,
        ));
    }

    public function adminVolsAction(Request $request) {

        $query = "SELECT CONCAT(first_name,' ',last_name) as name,ID FROM volunteer WHERE availability=" . "'" . "pending" . "'";
        $query1 = "SELECT name FROM skill";
        $result = CustomQuery::getInstance()->customQuery($query);
        $result1 = CustomQuery::getInstance()->customQuery($query1);
        $i = 0;
        $volunteers = NULL;
        $allvolunteers = NULL;
        $searchResult = NULL;
        $skills=NULL;

        if ($result) {
            while ($row = mysqli_fetch_row($result)) {
                $volunteers[$i] = new Volunteer();
                $volunteers[$i]->setFirstName($row[0]);
                $volunteers[$i]->setEmail($row[1]);
                $i++;
            }
        } else {
            die('Error');
        }

        if ($result1) {
            while ($row = mysqli_fetch_row($result1)) {
                $skills[$i] = new Skill();
                $skills[$i]->setName($row[0]);
                $i++;
            }
        } else {
            die('Error');
        }

        if ($request->getMethod() === 'GET' && $request->get('flag')) {
            $query = "SELECT CONCAT(first_name,' ',last_name) as name,email,availability FROM volunteer";
            $result = CustomQuery::getInstance()->customQuery($query);
            $i = 0;

            if ($result) {
                while ($row = mysqli_fetch_row($result)) {
                    $allvolunteers[$i] = new Volunteer();
                    $allvolunteers[$i]->setFirstName($row[0]);
                    $allvolunteers[$i]->setEmail($row[1]);
                    $allvolunteers[$i]->setAvailability($row[2]);


                    $i++;
                }
            } else {
                die('Error');
            }
        }


        if ($request->getMethod() === 'GET' && $request->get('query') != NULL) {
            $query = $request->get('query');

            $result = CustomQuery::getInstance()->customQuery($query);
            $i = 0;
            if ($result) {
                while ($row = mysqli_fetch_row($result)) {
                    $searchResult[$i] = new SearchVol();
                    $searchResult[$i]->setName($row[0]);
                    $searchResult[$i]->setEmail($row[1]);
                    $searchResult[$i]->setStatus($row[2]);
                    $searchResult[$i]->setSkill($row[3]);
                    $i++;
                }
            } else {
                die('Error Occured');
            }
        }

        return $this->container->get('templating')->renderResponse('AthwelaAdministratorBundle:Administrator:Volunteers.html.twig', array(
                    'volunteers' => $volunteers,
                    'allVolunteers' => $allvolunteers,
                    'searchVols' => $searchResult,
                    'skills' => $skills,
        ));
    }

    public function searchVolAction(Request $request) {
        $volSkill = null;
        $volName = null;
        $queryTemp = null;

        $query = "SELECT * FROM searchvol WHERE ";
        if ($request->getMethod() === 'POST') {
            $volName = $request->get('volName');
            $volSkill = $request->get('skill');
        }

        if ($volName) {
            $queryTemp.="and name like " . "'" . "%$volName%" . "' ";
        }
        if ($volSkill) {
            $queryTemp.="and skill=" . "'" . $volSkill . "' ";
        }

        $queryTemp1 = substr_replace($queryTemp, " ", 0, 3);

        $query.=$queryTemp1;

        $url = $this->container->get('router')->generate('athwela_administrator_volunteer', array('query' => $query));
        return new RedirectResponse($url);
    }

    public function approveVolsAction($email) {
        $conn = DBConnection::getInstance()->getConnection();
        $temp = Update::getInstance()->update($conn, 'volunteer', 'email', $email, array('availability'), array('available'));
        if ($temp) {
            $url = $this->container->get('router')->generate('athwela_administrator_volunteer');
            return new RedirectResponse($url);
        } else {
            die('Task Incompleted');
        }
    }

    public function rejectVolsAction($email) {
        $conn = DBConnection::getInstance()->getConnection();
        $temp = Delete::getInstance()->deleteRow($conn, 'volunteer', 'email', $email);
        if ($temp) {
            $url = $this->container->get('router')->generate('athwela_administrator_volunteer');
            return new RedirectResponse($url);
        } else {
            die('Task Incompleted');
        }
    }

    private function getNewMessages() {
        $query = "SELECT COUNT(vol_ID) as count FROM vol_admin_msg WHERE status=" . "'" . "notRead" . "'";
        $result = CustomQuery::getInstance()->customQuery($query);

        if ($result) {
            while ($row = mysqli_fetch_row($result)) {
                $value = $row[0];
            }
        } else {
            $value = 0;
        }
        return $value;
    }

    private function getNewProjects() {
        $query = "SELECT COUNT(ID) as count FROM project WHERE status=" . "'" . "pending" . "'";
        $result = CustomQuery::getInstance()->customQuery($query);

        if ($result) {
            while ($row = mysqli_fetch_row($result)) {
                $value = $row[0];
            }
        } else {
            $value = 0;
        }
        return $value;
    }

    private function getNewOrganizations() {
        $query = "SELECT COUNT(ID) as count FROM organization WHERE status=" . "'" . "pending" . "'";
        $result = CustomQuery::getInstance()->customQuery($query);

        if ($result) {
            while ($row = mysqli_fetch_row($result)) {
                $value = $row[0];
            }
        } else {
            $value = 0;
        }
        return $value;
    }

    private function getNewVolunteers() {
        $query = "SELECT COUNT(ID) as count FROM volunteer WHERE availability=" . "'" . "pending" . "'";
        $result = CustomQuery::getInstance()->customQuery($query);

        if ($result) {
            while ($row = mysqli_fetch_row($result)) {
                $value = $row[0];
            }
        } else {
            $value = 0;
        }
        return $value;
    }

}
