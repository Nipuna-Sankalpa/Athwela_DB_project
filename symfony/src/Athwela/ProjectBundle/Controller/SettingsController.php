<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Athwela\ProjectBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Athwela\DA\CustomQuery\CustomQuery;

/**
 * Description of Settings
 *
 * @author Flash
 */
class SettingsController extends Controller {

    public function createAction() {
        $user = $this->container->get('security.context')->getToken()->getUser();
        
        
        
        
        
    }

    private function getTypes() {
        $query = "SELECT ID,name FROM type";
        $result = CustomQuery::getInstance()->customQuery($query);
        $type = null;

        if ($result) {
            while ($row = mysqli_fetch_row($result)) {
                $type[$row[0]] = $row[1];
            }
        }
        return $type;
    }

    private function getSkill() {

        $query = "SELECT ID,name FROM skill";
        $result = CustomQuery::getInstance()->customQuery($query);
        $skill = null;

        if ($result) {
            while ($row = mysqli_fetch_row($result)) {
                $skill[$row[0]] = $row[1];
            }
        }
        return $skill;
    }
    
    private function renderForm(){
//        $form=$this->createForm(, $data, $options)
        
    }

}
