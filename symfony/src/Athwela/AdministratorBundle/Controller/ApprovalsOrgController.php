<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Athwela\AdministratorBundle\Controller;

/**
 * Description of ApprovalsOrgController
 *
 * @author Yellow Flash
 * 
 */
use Symfony\Component\DependencyInjection\ContainerAware;
use Athwela\DA\DBConnection;
use Athwela\DA\CRUD\Update;
use Athwela\DA\CRUD\Delete;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Athwela\EntityBundle\Entity\Volunteer;
use Athwela\EntityBundle\Entity\Type;
use Athwela\DA\CustomQuery\CustomQuery;
use Symfony\Component\HttpFoundation\Request;
use Athwela\AdministratorBundle\Entity\SearchVol;

class ApprovalsOrgController extends ContainerAware {

    public function adminOrgAction(Request $request) {

        $query = "SELECT name,ID FROM organization WHERE status=" . "'" . "pending" . "'";
        $quer1 = "SELECT name,ID FROM organization WHERE status=" . "'" . "pending" . "'";
        $result = CustomQuery::getInstance()->customQuery($query);
        $result1 = CustomQuery::getInstance()->customQuery($query1);
        $i = 0;
        $orgs = NULL;
        $allorgs = NULL;
        $searchOrg = NULL;


        if ($result) {
            while ($row = mysqli_fetch_row($result)) {
                $orgs[$i] = new Volunteer();
                $orgs[$i]->setFirstName($row[0]);
                $orgs[$i]->setId($row[1]);
                $i++;
            }
        } else {
            die('Error');
        }

        if ($request->getMethod() === 'GET' && $request->get('flag')) {
            $query = "SELECT name,country,status FROM organization";
            $result = CustomQuery::getInstance()->customQuery($query);
            $i = 0;

            if ($result) {
                while ($row = mysqli_fetch_row($result)) {
                    $allorgs[$i] = new Organization();
                    $allorgs[$i]->seName($row[0]);
                    $allorgs[$i]->setCountry($row[1]);
                    $allorgs[$i]->setAvailability($row[2]);
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
                    $searchOrg[$i] = new SearchVol();
                    $searchOrg[$i]->setName($row[0]);
                    $searchOrg[$i]->setCountry($row[1]);
                    $searchOrg[$i]->setStatus($row[2]);

                    $i++;
                }
            } else {
                die('Error Occured');
            }
        }

        return $this->container->get('templating')->renderResponse('AthwelaAdministratorBundle:Administrator:Volunteers.html.twig', array(
                    'volunteers' => $orgs,
                    'allVolunteers' => $allorgs,
                    'searchVols' => $searchOrg,
                    'types' => $types,
        ));
    }

    public function searchOrgAction(Request $request) {
        $orgType = null;
        $orgName = null;
        $queryTemp = null;

        $query = "SELECT name,country,status FROM organization WHERE ";
        if ($request->getMethod() === 'POST') {
            $orgName = $request->get('orgName');
            $orgType = $request->get('orgType');
        }

        if ($orgName) {
            $queryTemp.="and name like " . "'" . "%$orgName%" . "' ";
        }
        if ($orgType) {
            $queryTemp.="and skill=" . "'" . $orgType . "' ";
        }

        $queryTemp1 = substr_replace($queryTemp, " ", 0, 3);

        $query.=$queryTemp1;

        $url = $this->container->get('router')->generate('athwela_administrator_organization', array('query' => $query));
        return new RedirectResponse($url);
    }

    public function approveOrgsAction($email) {
        $conn = DBConnection::getInstance()->getConnection();
        $temp = Update::getInstance()->update($conn, 'Organization', 'email', $email, array('status'), array('approved'));
        if ($temp) {
            $url = $this->container->get('router')->generate('athwela_administrator_organization');
            return new RedirectResponse($url);
        } else {
            die('Task Incompleted');
        }
    }

    public function rejectOrgsAction($email) {
        $conn = DBConnection::getInstance()->getConnection();
        $temp = Delete::getInstance()->deleteRow($conn, 'Organization', 'email', $email);
        if ($temp) {
            $url = $this->container->get('router')->generate('athwela_administrator_organization');
            return new RedirectResponse($url);
        } else {
            die('Task Incompleted');
        }
    }

}
