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

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Athwela\EntityBundle\Entity\Volunteer;
use Athwela\DA\CRUD\Read;
use Athwela\DA\CustomQuery\CustomQuery;
use Athwela\DA\DBConnection;

class VolProfileController extends Controller {

    public function indexAction() {
        return $this->render('VolProfileBundle:VolProfile:index.html.twig');
    }

    public function showAction($email) {
        $conn = DBConnection::getInstance()->openConnection('localhost', 'root', 'dilini', 'athwela1');
        $entity = Read::getInstance()->read($conn, new Volunteer(), 'volunteer', 'email', $email);
        $entitymobile = Read::getInstance()->readMul($conn, 'v_ID', $entity->getId(), 'volunteer_mobile');        
        $edu = $this->getEdu($conn, $entity);
        $skill = $this->getSkills($conn, $entity);
        $interest = $this->getInterestedAreas($conn, $entity);
        return $this->render('VolProfileBundle:VolProfile:show.html.twig', array(
                    'entity' => $entity,
                    'entitymobile' => $entitymobile,
                    'edu' => $edu,
                    'skills' => $skill,
                    'interests' => $interest
        ));
    }
    public function getSkills($conn, $entity){
        $j = 0;
        $skills = CustomQuery::getInstance()->customQuery($conn, 'Select s.name, s.description from skill as s, volunteer_skill as vs where s.ID = vs.s_ID and vs.v_ID = ' . $entity->getId());
        while ($row = mysqli_fetch_row($skills)) {
            for ($index = 0; $index < count($row); $index++) {
                $temp[$j][$index] = $row[$index];
            }$j++;
        }
        return $temp;
    }
    
    public function getEdu($conn, $entity){
        $i = 0;
        $entityedu = CustomQuery::getInstance()->customQuery($conn, 'Select i.name, vi.degree, vi.start_date, vi.end_date, i.city, i.country from institute as i, volunteer_education as vi where i.ID = vi.i_ID and vi.v_ID = ' . $entity->getId());
        while ($row = mysqli_fetch_row($entityedu)) {
            for ($index = 0; $index < count($row); $index++) {
                $temp[$i][$index] = $row[$index];
            }$i++;
        }
        return $temp;
    }
    
    public function getInterestedAreas($conn, $entity){
        $i = 0;
        $intareas = CustomQuery::getInstance()->customQuery($conn, 'select t.name, t.description from type as t, volunteer_interested_area as via where t.ID = via.t_ID and via.v_ID = ' . $entity->getId());
        while ($row = mysqli_fetch_row($intareas)) {
            for ($index = 0; $index < count($row); $index++) {
                $temp[$i][$index] = $row[$index];
            }$i++;
        }
        return $temp;
    }
}
