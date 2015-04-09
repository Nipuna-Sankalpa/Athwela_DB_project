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
use Athwela\EntityBundle\Entity\Organization;

use Athwela\DA\CustomQuery\CustomQuery;
use Symfony\Component\HttpFoundation\Request;


class ApprovalsOrgController extends ContainerAware {

    public function adminOrgAction(Request $request) {

        $query = "SELECT name,ID FROM organization WHERE status=" . "'" . "pending" . "'";
        $query1 = "SELECT name FROM type";
        $result = CustomQuery::getInstance()->customQuery($query);
        $result1 = CustomQuery::getInstance()->customQuery($query1);
        $i = 0;
        $newOrgs = NULL;
        $allOrgs = NULL;
        $searchOrg = NULL;
        $types = NULL;


        if ($result) {
            while ($row = mysqli_fetch_row($result)) {
                $newOrgs[$i] = new Organization();
                $newOrgs[$i]->setName($row[0]);
                $newOrgs[$i]->setId($row[1]);
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
                    $allOrgs[$i] = new Organization();
                    $allOrgs[$i]->setName($row[0]);
                    $allOrgs[$i]->setCountry($row[1]);
                    $allOrgs[$i]->setStatus($row[2]);
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
                    $searchOrg[$i] = new Organization();
                    $searchOrg[$i]->setName($row[0]);
                    $searchOrg[$i]->setCountry($row[1]);
                    $searchOrg[$i]->setStatus($row[2]);

                    $i++;
                }
            } else {
                die('Error Occured');
            }
        }

        return $this->container->get('templating')->renderResponse('AthwelaAdministratorBundle:Administrator:Organization.html.twig', array(
                    'newOrgs' => $newOrgs,
                    'allOrgs' => $allOrgs,
                    'searchOrgs' => $searchOrg,
                    
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
            $queryTemp.="name like " . "'" . "%$orgName%" . "' ";
        }
 
        $query.=$queryTemp;

        $url = $this->container->get('router')->generate('athwela_administrator_organization', array('query' => $query));
        return new RedirectResponse($url);
    }

    public function approveOrgsAction($id) {
        $conn = DBConnection::getInstance()->getConnection();
        $temp = Update::getInstance()->update($conn, 'Organization', 'ID', $id, array('status'), array('approved'));
        if ($temp) {
            $url = $this->container->get('router')->generate('athwela_administrator_organization');
            return new RedirectResponse($url);
        } else {
            die('Task Incompleted');
        }
    }

    public function rejectOrgsAction($id) {
        $conn = DBConnection::getInstance()->getConnection();
        $temp = Delete::getInstance()->deleteRow($conn, 'Organization', 'ID', $id);
        if ($temp) {
            $url = $this->container->get('router')->generate('athwela_administrator_organization');
            return new RedirectResponse($url);
        } else {
            die('Task Incompleted');
        }
    }

}
