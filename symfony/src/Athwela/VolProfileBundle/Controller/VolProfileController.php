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
use Athwela\DA\CRUD\Read;
use Athwela\DA\CustomQuery\CustomQuery;
use Athwela\DA\DBConnection;
use Symfony\Component\HttpFoundation\Request;

class VolProfileController extends ContainerAware {

    public function indexAction() {
        return $this->render('VolProfileBundle:VolProfile:index.html.twig');
    }

//    method will bahave as it was before.
//    when you use this method to show profile other than the one who has already logged in symply pass his/her email
//    along with the route.
    
    public function showAction(Request $request) {

        $user = $this->container->get('security.context')->getToken()->getUser();
        
        if ($request->getMethod() === 'GET' && $request->get('email') != NULL) {
            $email = $request->get('email');
        } else {
            $email = $user->getEmail();
        }
        
        $conn = DBConnection::getInstance()->getConnection();
        $entity = Read::getInstance()->read($conn, new Volunteer(), 'volunteer', 'email', $email);
        $entitymobile = Read::getInstance()->readMul($conn, 'v_ID', $entity->getId(), 'volunteer_mobile');
        $edu = $this->getEdu($conn, $entity);
        $skill = $this->getSkills($conn, $entity);
        $interest = $this->getInterestedAreas($conn, $entity);
        $admin = $this->getAdmin($conn, $entity);

        return $this->container->get('templating')->renderResponse('VolProfileBundle:VolProfile:show.html.twig', array(
                    'entity' => $entity,
                    'entitymobile' => $entitymobile,
                    'edu' => $edu,
                    'skills' => $skill,
                    'interests' => $interest,
                    'admin' => $admin
        ));
    }

    public function getSkills($conn, $entity) {
        $j = 0;
        $skills = CustomQuery::getInstance()->customQuery('Select s.name, s.description from skill as s, volunteer_skill as vs where s.ID = vs.s_ID and vs.v_ID = ' . $entity->getId());
        while ($row = mysqli_fetch_row($skills)) {
            for ($index = 0; $index < count($row); $index++) {
                $temp[$j][$index] = $row[$index];
            }$j++;
        }
        return $temp;
    }

    public function getEdu($conn, $entity) {
        $i = 0;
        $entityedu = CustomQuery::getInstance()->customQuery('Select i.name, vi.degree, vi.start_date, vi.end_date, i.city, i.country from institute as i, volunteer_education as vi where i.ID = vi.i_ID and vi.v_ID = ' . $entity->getId());
        while ($row = mysqli_fetch_row($entityedu)) {
            for ($index = 0; $index < count($row); $index++) {
                $temp[$i][$index] = $row[$index];
            }$i++;
        }
        return $temp;
    }

    public function getInterestedAreas($conn, $entity) {
        $i = 0;
        $intareas = CustomQuery::getInstance()->customQuery('select t.name, t.description from type as t, volunteer_interested_area as via where t.ID = via.t_ID and via.v_ID = ' . $entity->getId());
        while ($row = mysqli_fetch_row($intareas)) {
            for ($index = 0; $index < count($row); $index++) {
                $temp[$i][$index] = $row[$index];
            }$i++;
        }
        return $temp;
    }

    public function getAdmin($conn, $entity) {
        $admin = CustomQuery::getInstance()->customQuery('SELECT a.first_name, a.last_name FROM `admin` as a, volunteer as v where a.ID = v.a_ID and v.ID = ' . $entity->getId());
        $temp = '';
        while ($row = mysqli_fetch_row($admin)) {
            $temp = $row[0] . ' ' . $row[1];
        }
        return $temp;
    }

//    public function editAction($email) {
//        $conn = DBConnection::getInstance()->openConnection('localhost', 'root', 'dilini', 'athwela1');
//        $entity = Read::getInstance()->read($conn, new Volunteer(), 'volunteer', 'email', $email);
//        $entitymobile = Read::getInstance()->readMul($conn, 'v_ID', $entity->getId(), 'volunteer_mobile');
//        $edu = $this->getEdu($conn, $entity);
//        return $this->render('VolProfileBundle:VolProfile:edit.html.twig', array(
//                    'entity' => $entity,
//                    'entitymobile' => $entitymobile,
//                    'edu' => $edu
//        ));
//    }
//    public function updateAction(Request $request, $email) {
//        if ($request->getMethod() == "POST") {
//            $conn = DBConnection::getInstance()->openConnection('localhost', 'root', 'dilini', 'athwela1');
//            $updatedValues;
//        }
//        return $this->redirect($this->generateUrl('vol_profile_edit', array('email' => $email)));
//    }
}
