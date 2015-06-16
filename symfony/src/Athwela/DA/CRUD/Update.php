<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Athwela\DA\CRUD;

use Athwela\DA\DBConnection;
use Athwela\DA\CRUD\Read;
use Athwela\DA\CRUD\Create;
use Athwela\DA\CRUD\Delete;

/**
 * Description of Update
 *
 * @author Yellow Flash
 */
class Update {

    //put your code here


    private function __construct() {
        
    }

    public static function getInstance() {
        static $instance = null;
        if ($instance === null) {
            $instance = new Update();
        }
        return $instance;
    }

//ex:- update($conn,table name,condition affected column,value of the index,array(fields whic are about to update),array( update values))
//values and fields which are about to update shuold lie on same sequence 

    public function update($table, $index, $value, $updatedFields, $updatedValues) {
        $column = null;
        $conn = DBConnection::getInstance()->getConnection();
        for ($i = 0; $i < sizeof($updatedFields) - 1; $i++) {
            $column.=$updatedFields[$i] . "=" . "'" . $updatedValues[$i] . "',";
        }
        $column.=$updatedFields[sizeof($updatedFields) - 1] . "=" . "'" . $updatedValues[sizeof($updatedFields) - 1] . "'";
        $query = "UPDATE $table SET $column WHERE $index = " . "'" . "$value" . "'";
        if ($conn->query($query) === TRUE) {
            return true;
        } else {
            return $conn->error;
        }
    }

    public function updateSkills($skills, $id) {
        $conn = DBConnection::getInstance()->getConnection();
        Delete::getInstance()->deleteRow('volunteer_skill', 'volunteer_ID', $id);
        DBConnection::getInstance()->closeConnection($conn);

        for ($i = 0; $i < sizeof($skills); $i++) {
            $skill_ID = Read::getInstance()->readSpecific('ID', 'skill', 'name', $skills[$i]);
            Create::getInstance()->insertMul('volunteer_skill', $id, $skill_ID);
        }
    }

    public function updateMobile($table, $phoneNu, $column, $id) {
        $conn = DBConnection::getInstance()->getConnection();
        Delete::getInstance()->deleteRow($table, $column, $id);
        DBConnection::getInstance()->closeConnection($conn);
        for ($i = 0; $i < sizeof($phoneNu) - 1; $i++) {

            Create::getInstance()->insertMul($table, $id, $phoneNu[$i]);
        }
    }

    public function updateSpecific($table, $index, $value, $updatedField, $updatedValue) {
        $conn = DBConnection::getInstance()->getConnection();
        $query = "UPDATE $table SET $updatedField = '" . $updatedValue . "' WHERE $index = '" . $value . "'";
        if ($conn->query($query) === TRUE) {
            return true;
        } else {
            return $conn->error;
        }
    }

}
