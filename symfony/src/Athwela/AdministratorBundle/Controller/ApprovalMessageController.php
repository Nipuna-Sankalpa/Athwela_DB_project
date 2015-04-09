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
use Athwela\EntityBundle\Entity\orgAdminMsg;
use Athwela\EntityBundle\Entity\volAdminMsg;
use Athwela\AdministratorBundle\Entity\AdminOrgMsg;
use Athwela\AdministratorBundle\Entity\AdminVolMsg;
use Athwela\DA\CustomQuery\CustomQuery;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints\DateTime;

/**
 * Description of ApprovalMessageController
 *
 * @author Yellow Flash
 */
class ApprovalMessageController extends ContainerAware {

    public function adminMessageAction(Request $request) {

        $query1 = "SELECT name,date(timeStamp),timeStamp FROM admin_vol_msg WHERE status=" . "'" . "notRead" . "'";
        $query = "SELECT name,date(timeStamp),timeStamp FROM admin_org_msg WHERE status=" . "'" . "notRead" . "'";

        $result = CustomQuery::getInstance()->customQuery($query);
        $result1 = CustomQuery::getInstance()->customQuery($query1);

        $i = 0;
        $newMsgsOrg = NULL;
        $newMsgsVol = NULL;
        $allMsgsOrg = NULL;
        $allMsgsVol = NULL;
        $searchMsgs = NULL;
        



        if ($result) {
            while ($row = mysqli_fetch_row($result)) {
                $newMsgsOrg[$i] = new AdminOrgMsg();
                $newMsgsOrg[$i]->setName($row[0]);
                $newMsgsOrg[$i]->setTimeStamp($row[1]);
                $newMsgsOrg[$i]->setFakeTS($row[2]);
                $i++;
            }
        } else {
            die('Error');
        }

        if ($result1) {
            while ($row = mysqli_fetch_row($result1)) {
                $newMsgsVol[$i] = new AdminVolMsg();
                $newMsgsVol[$i]->setName($row[0]);
                $newMsgsVol[$i]->setTimeStamp($row[1]);
                $newMsgsVol[$i]->setFakeTS($row[2]);
                $i++;
            }
        } else {
            die('Error');
        }


        if ($request->getMethod() === 'GET' && $request->get('flag')) {
            $query = "SELECT name,date(timeStamp),status FROM admin_vol_msg";
            $query1 = "SELECT name,date(timeStamp),status FROM admin_org_msg";
            $result = CustomQuery::getInstance()->customQuery($query);
            $result1 = CustomQuery::getInstance()->customQuery($query1);
            $i = 0;

            if ($result) {
                while ($row = mysqli_fetch_row($result)) {

                    $allMsgsOrg[$i] = new AdminOrgMsg();
                    $allMsgsOrg[$i]->setName($row[0]);
                    $allMsgsOrg[$i]->setTimeStamp($row[1]);
                    $allMsgsOrg[$i]->setStatus($row[2]);
                    $i++;
                }
            } else {
                die('Error');
            }
            if ($result1) {
                while ($row = mysqli_fetch_row($result1)) {

                    $allMsgsVol[$i] = new AdminVolMsg();
                    $allMsgsVol[$i]->setName($row[0]);
                    $allMsgsVol[$i]->setTimeStamp($row[1]);
                    $allMsgsVol[$i]->setStatus($row[2]);
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

                    $searchMsgs[$i] = new AdminOrgMsg();
                    $searchMsgs[$i]->setName($row[2]);
                    $searchMsgs[$i]->setTimeStamp($row[0]);
                    $searchMsgs[$i]->setStatus($row[1]);

                    $i++;
                }
            } else {

                die('Error Occured');
            }
        }

        return $this->container->get('templating')->renderResponse('AthwelaAdministratorBundle:Administrator:Messages.html.twig', array(
                    'searchMsgs' => $searchMsgs,
                    
                    'allMsgsOrg' => $allMsgsOrg,
                    'allMsgsVol' => $allMsgsVol,
                    'newMsgsVol' => $newMsgsVol,
                    'newMsgsOrg' => $newMsgsOrg,
        ));
    }

    public function searchMessageAction(Request $request) {
        $orgName = null;
        $volName = null;
        $lDate = null;
        $fDate = null;

        $queryTemp = null;
        $query = "select * from (
                    select timeStamp,status,name from admin_org_msg
                    union all
                    select timeStamp,status,name from admin_vol_msg
                    ) as a where ";



        if ($request->getMethod() === 'POST') {

            $orgName = $request->get('orgName');
            $volName = $request->get('orgName');
            $lDate = $this->dateConvert($request->get('lDate'));
            $fDate = $this->dateConvert($request->get('fDate'));
        }

        if ($orgName) {
            $queryTemp.="and name like " . "'" . "%$orgName%" . "' ";
        }
        if ($volName) {
            $queryTemp.="and name like " . "'" . "%$volName%" . "' ";
        }
        if ($lDate && $fDate) {
            $queryTemp.="and timeStamp between " . "'" . "$fDate" . "' and '" . "$lDate" . "'";
        }

        $queryTemp1 = substr_replace($queryTemp, " ", 0, 3);

        $query.=$queryTemp1;
        




        $url = $this->container->get('router')->generate('athwela_administrator_message', array('query' => $query));
        return new RedirectResponse($url);
    }

    public function approveOrgMessageAction($timeStamp) {
        $conn = DBConnection::getInstance()->getConnection();
        $temp = Update::getInstance()->update($conn, 'org_admin_msg', 'date', $timeStamp, array('msgStatus'), array('read'));
        if ($temp) {
            $url = $this->container->get('router')->generate('athwela_administrator_message');
            return new RedirectResponse($url);
        } else {
            die('Task Incompleted');
        }
    }

    public function approveVolMessageAction($timeStamp) {
        $conn = DBConnection::getInstance()->getConnection();
        $temp = Update::getInstance()->update($conn, 'vol_admin_msg', 'date', $timeStamp, array('msgStatus'), array('read'));
        if ($temp) {
            $url = $this->container->get('router')->generate('athwela_administrator_message');
            return new RedirectResponse($url);
        } else {
            die('Task Incompleted');
        }
    }

    public function rejectVolMessageAction($timeStamp) {
        $conn = DBConnection::getInstance()->getConnection();
        $temp = Delete::getInstance()->deleteRow($conn, 'vol_admin_msg', 'date', $timeStamp);
        if ($temp) {
            $url = $this->container->get('router')->generate('athwela_administrator_message');
            return new RedirectResponse($url);
        } else {
            die('Task Incompleted');
        }
    }

    public function rejectOrgMessageAction($timeStamp) {
        $conn = DBConnection::getInstance()->getConnection();
        $temp = Delete::getInstance()->deleteRow($conn, 'org_admin_msg', 'date', $timeStamp);
        if ($temp) {
            $url = $this->container->get('router')->generate('athwela_administrator_message');
            return new RedirectResponse($url);
        } else {
            die('Task Incompleted');
        }
    }

    private function dateConvert($date) {

        $dateTime = new \DateTime($date);
        $formatted_date = date_format($dateTime, 'Y-m-d');

        return $formatted_date;
    }

}
