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
use Symfony\Component\HttpFoundation\Request;

class VolProfileController extends ContainerAware {

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


        $entity = Read::getInstance()->read(new Volunteer(), 'volunteer', 'email', $email);

        $entitymobile = Read::getInstance()->readMul('v_ID', $entity->getId(), 'volunteer_mobile');
        $edu = $this->getEdu($entity);
        $skill = $this->getSkills($entity);
        $interest = $this->getInterestedAreas($entity);
        $notification = $this->getNotificationCount($entity);
  
        $query = "SELECT image FROM volunteer WHERE email=" . "'" . $email . "'";
        $result = CustomQuery::getInstance()->customQuery($query);
        $proImg = null;

        if ($result) {
            while ($row = mysqli_fetch_row($result)) {
                $proImg = $row[0];
            }
        }

        return $this->container->get('templating')->renderResponse('VolProfileBundle:VolProfile:show.html.twig', array(
                    'entity' => $entity,
                    'entitymobile' => $entitymobile,
                    'edu' => $edu,
                    'proImg' => $proImg,
                    'skills' => $skill,
                    'interests' => $interest,
                    'notification' => $notification
        ));
    }

    public function getSkills($entity) {
        $j = 0;
        $temp = null;
        $skills = CustomQuery::getInstance()->customQuery('Select s.name, s.description from skill as s, volunteer_skill as vs where s.ID = vs.s_ID and vs.v_ID = ' . $entity->getId());
        while ($row = mysqli_fetch_row($skills)) {
            for ($index = 0; $index < count($row); $index++) {
                $temp[$j][$index] = $row[$index];
            }$j++;
        }
        return $temp;
    }

    public function getEdu($entity) {
        $i = 0;
        $temp = null;
        $entityedu = CustomQuery::getInstance()->customQuery('Select i.name, vi.degree, vi.start_date, vi.end_date, i.city, i.country from institute as i, volunteer_education as vi where i.ID = vi.i_ID and vi.v_ID = ' . $entity->getId());
        while ($row = mysqli_fetch_row($entityedu)) {
            for ($index = 0; $index < count($row); $index++) {
                $temp[$i][$index] = $row[$index];
            }$i++;
        }
        return $temp;
    }

    public function getInterestedAreas($entity) {
        $i = 0;
        $temp = null;
        $intareas = CustomQuery::getInstance()->customQuery('select t.name, t.description from type as t, volunteer_interested_area as via where t.ID = via.t_ID and via.v_ID = ' . $entity->getId());
        while ($row = mysqli_fetch_row($intareas)) {
            for ($index = 0; $index < count($row); $index++) {
                $temp[$i][$index] = $row[$index];
            }$i++;
        }
        return $temp;
    }

    public function getNotificationCount($entity) {
        $temp[] = 0;

        $notification1 = CustomQuery::getInstance()->customQuery('SELECT count(*) FROM admin_vol_messages where msgStatus = "notRead" and v_ID = ' . $entity->getId());

        while ($row = mysqli_fetch_row($notification1)) {
            $temp[0] = $row[0];
        }
        $notification2 = CustomQuery::getInstance()->customQuery('SELECT count(distinct vp.accepted_at) FROM fos_user, volunteer, volunteer_project as vp where vp.v_ID = ' . $entity->getId() . ' and volunteer.email = fos_user.email and volunteer.ID = ' . $entity->getId() . ' and last_login <= vp.accepted_at and vp.status = "notSeen"');
        while ($row = mysqli_fetch_row($notification2)) {
            $temp[1] = $row[0];
        }
        return $temp;
    }

}
