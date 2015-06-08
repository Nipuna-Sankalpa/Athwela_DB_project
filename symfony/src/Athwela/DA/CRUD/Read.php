<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Athwela\DA\CRUD;

use Athwela\DA\DBConnection;

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
    public function read($entity, $table, $index, $value) {
        $query = "SELECT * FROM $table WHERE $index " . "=" . "'" . "$value" . "'";
        $conn = DBConnection::getInstance()->getConnection();
        $object = null;
        $result = $conn->query($query);
        if ($result) {
            while ($row = mysqli_fetch_row($result)) {
                $object = $this->entityAssign($row, get_class($entity), $entity);
            }
            DBConnection::getInstance()->closeConnection($conn);
            return $object;
        } else {
            die($conn->error);
        }
    }

    public function readSpecific($column, $table, $index, $value) {
        $query = "SELECT " . $column . " FROM $table WHERE $index " . "=" . "'" . "$value" . "'";
        $conn = DBConnection::getInstance()->getConnection();
        $result = $conn->query($query);
        DBConnection::getInstance()->closeConnection($conn);

        if ($result) {
            $row = mysqli_fetch_row($result);

            return $row[0];
        } else {
            die($conn->error);
        }
    }

    public function readSkills($v_ID) {
        $query = "SELECT name FROM skill NATURAL JOIN volunteer_skill WHERE skill.ID = volunteer_skill.s_ID AND volunteer_skill.v_ID = " . $v_ID;
        $conn = DBConnection::getInstance()->getConnection();
        $result = $conn->query($query);
        $mulVal = NULL;
        $i = 0;
        if ($result) {
            while ($row = mysqli_fetch_row($result)) {
                $mulVal[$i] = $row[0];
                $i++;
            }
            DBConnection::getInstance()->closeConnection($conn);
            return $mulVal;
        } else {
            die($conn->error);
        }
    }

    public function readAllSkills() {
        $query = "SELECT name FROM skill";
        $conn = DBConnection::getInstance()->getConnection();
        $result = $conn->query($query);
        $mulVal = NULL;
        $i = 0;
        if ($result) {
            while ($row = mysqli_fetch_row($result)) {
                $mulVal[$i] = $row[0];
                $i++;
            }
            DBConnection::getInstance()->closeConnection($conn);
            return $mulVal;
        } else {
            die($conn->error);
        }
    }

    public function readSpecificMul($col, $index, $Value, $table) {
        $query = "SELECT $col FROM $table WHERE $index" . "=" . "'" . $Value . "';";
        $conn = DBConnection::getInstance()->getConnection();
        $result = $conn->query($query);
        $mulVal = NULL;
        $i = 0;
        if ($result) {
            while ($row = mysqli_fetch_row($result)) {
                $mulVal[$i] = $row[1];
                $i++;
            }
            DBConnection::getInstance()->closeConnection($conn);
            return $mulVal;
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
            $institute->setId($row[0]);
            $institute->setName($row[1]);
            $institute->setCity($row[2]);
            $institute->setCountry($row[3]);

            return $institute;
        }
        if ($temp[sizeof($temp) - 1] == 'Organization') {
            $organization = $entity;
            $organization->setID($row[0]);
            $organization->setEmail($row[1]);
            $organization->setA_ID($row[2]);
            $organization->setName($row[3]);
            $organization->setDescription($row[4]);
            $organization->setStreet($row[5]);
            $organization->setCity($row[6]);
            $organization->setCountry($row[7]);
            return $organization;
        }

        if ($temp[sizeof($temp) - 1] == 'Project') {

            $project = $entity;

            $project->setID($row[0]);
            $project->setA_ID($row[1]);
            $project->setT_ID($row[2]);
            $project->setO_ID($row[3]);
            $project->setTitle($row[4]);
            $project->setDescription($row[5]);
            $project->setStatus($row[6]);
            $project->setStartDate($row[7]);
            $project->setEndDate($row[8]);
            $project->setVolunteersNeeded($row[9]);
            $project->setNoOfFilledPositions($row[10]);
            $project->setPostedDate($row[11]);


            return $project;
        }
        if ($temp[sizeof($temp) - 1] == 'Type') {

            $type = $entity;
            $type->setId($row[0]);
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
            $volunteer->setDob($row[10]);
            $volunteer->setBlog($row[11]);
            $volunteer->setLinkedin($row[12]);
            $volunteer->setFacebook($row[13]);
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

    public function readMul($indexCol, $indexVal, $table) {
        $query = "SELECT * FROM $table WHERE $indexCol" . "=" . "'" . $indexVal . "';";
        $conn = DBConnection::getInstance()->getConnection();
        $result = $conn->query($query);
        $mulVal = NULL;
        $i = 0;
        if ($result) {
            while ($row = mysqli_fetch_row($result)) {
                $mulVal[$i] = $row[1];
                $i++;
            }
            DBConnection::getInstance()->closeConnection($conn);
            return $mulVal;
        } else {
            die($conn->error);
        }
    }

}
