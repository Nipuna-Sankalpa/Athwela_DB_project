<?php

namespace Athwela\AdministratorBundle\Controller;

use Symfony\Component\DependencyInjection\ContainerAware;
use Athwela\DA\DBConnection;
use Athwela\DA\CRUD\Read;
use Athwela\EntityBundle\Entity\Admin;
use Athwela\DA\CustomQuery\CustomQuery;

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
