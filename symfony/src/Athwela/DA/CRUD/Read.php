<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Athwela\DA\CRUD;

use Athwela\EntityBundle\Entity\Admin;
use Athwela\EntityBundle\Entity\Institute;
use Athwela\EntityBundle\Entity\Organization;
use Athwela\EntityBundle\Entity\Project;
use Athwela\EntityBundle\Entity\Skill;
use Athwela\EntityBundle\Entity\Volunteer;
use Athwela\EntityBundle\Entity\Type;

/**
 * Description of Read
 *
 * @author Yellow Flash
 */
class Read {

    private function __construct() {
        
    }

    public static function getInstance() {
        $instance = null;
        if ($instance === null) {
            $instance = new Read();
        }
        return $instance;
    }

    // pass connection variable ,instance of the entity which required,table name,index col,index col val
    //index used to impose conditions
    public function read($conn, $entity, $table, $index, $value) {
        $query = "SELECT * FROM $table WHERE $index " . "=" . "'" . "$value" . "'";

        $result = $conn->query($query);

        if ($result) {
            while ($row = mysqli_fetch_row($result)) {
                $object = $this->entityAssign($row, get_class($entity), $entity);
            }
            return $object;
        } else {
            die($conn->error);
        }
    }

    private function entityAssign($row, $class, $entity) {
        $temp = explode("\\", $class);


        if ($temp[sizeof($temp) - 1] == 'Admin') {
            $admin = $entity;
            $admin->setId($row[0]);
            $admin->setFirstName($row[1]);
            $admin->setLastName($row[2]);
            $admin->setStreet($row[3]);
            $admin->setCity($row[4]);
            $admin->setCountry($row[5]);
            $admin->setEmail($row[6]);
            return $admin;
        }

        if ($temp[sizeof($temp) - 1] == 'Institute') {
            $institute = $entity;
            $institute->setID($row[0]);
            $institute->setName($row[1]);
            $institute->setCity($row[2]);
            $institute->setCountry($row[3]);

            return $institute;
        }
        if ($temp[sizeof($temp) - 1] == 'Organization') {
            $organization = $entity;
            $organization->setID($row[0]);
            $organization->setA_ID($row[1]);
            $organization->setName($row[2]);
            $organization->setDescription($row[3]);
            $organization->setStreet($row[4]);
            $organization->setCity($row[5]);
            $organization->setCountry($row[6]);
            return $organization;
        }

        if ($temp[sizeof($temp) - 1] == 'Project') {

            $project = $entity;
            $project->setID($row[0]);
            $project->setA_ID($row[2]);
            $project->setT_ID($row[3]);
            $project->setO_ID($row[4]);
            $project->setTitle($row[5]);
            $project->setDescription($row[6]);
            $project->setStatus($row[7]);
            $project->setStartDatert($row[8]);
            $project->setEndDate($row[9]);
            $project->setVolunteersNeeded($row[10]);
            $project->setNoOfFilledPositions($row[11]);
            $project->setPostedDate($row[12]);

            return $project;
        }
        if ($temp[sizeof($temp) - 1] == 'Type') {

            $type = $entity;
            $type->setID($row[0]);
            $type->setName($row[1]);
            $type->setDescription($row[2]);

            return $type;
        }
        if ($temp[sizeof($temp) - 1] == 'Volunteer') {
            $volunteer = $entity;

            $volunteer->setId($row[0]);
            $volunteer->setA_ID($row[1]);
            $volunteer->setFirstName($row[2]);
            $volunteer->setLastName($row[3]);
            $volunteer->setStreet($row[4]);
            $volunteer->setCity($row[5]);
            $volunteer->setCountry($row[6]);
            $volunteer->setemail($row[7]);
            $volunteer->setGender($row[8]);
            $volunteer->setAvailability($row[9]);

            return $volunteer;
        }
        if ($temp[sizeof($temp) - 1] == 'Skill') {
            $skill = $entity;

            $skill->setId($row[0]);
            $skill->setName($row[1]);
            $skill->setDescription($row[2]);

            return $skill;
        }
    }

    
//  read multi values pass connection variable, ID column name, ID value, table name 
    
    public function readMul($conn, $indexCol, $indexVal, $table) {

        $query = "SELECT * FROM $table WHERE $indexCol" . "=" . "'" . $indexVal . "';";
        $result = $conn->query($query);
        $i = 0;
        if ($result) {
            while ($row = mysqli_fetch_row($result)) {
                $mulVal[$i] = $row[1];
                $i++;
            }
            return $mulVal;
        } else {
            die($conn->error);
        }
    }

}
