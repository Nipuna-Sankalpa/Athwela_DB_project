<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Athwela\DA\CRUD;

use Athwela\DA\DBConnection;
/**
 * Description of Create
 *
 * @author Yellow Flash
 */
class Create {

    private function __construct() {
        
    }

    public static function getInstance() {
        $instance = null;
        if ($instance === null) {
            $instance = new Create();
        }
        return $instance;
    }

//pass connection variable along with values(type array),table name
//   ex:- create(array(),$table name);
    
    
    public function create($values, $tableName) {
        $val = null;
        $conn = DBConnection::getInstance()->getConnection();
        var_dump($values);
        for ($i = 0; $i < sizeof($values) - 1; $i++) {
            $val.="'" . $values[$i] . "'" . ",";
        }
        if ($val) {
            $val = $val . "'" . $values[sizeof($values) - 1] . "'";
            $query = "INSERT INTO $tableName VALUES ($val);";

            if ($conn->query($query) === TRUE) {
                DBConnection::getInstance()->closeConnection($conn);
                return true;
            } else {
                echo "Error: " . $query . "<br>" . $conn->error;
                DBConnection::getInstance()->closeConnection($conn);
                return false;
            }
        }
        
    }  
    
    public function insertMul($table,$index,$value) {

            $conn = DBConnection::getInstance()->getConnection();
            $query = "INSERT INTO $table VALUES ('" . $index . "' , '".$value."' )" ;
            if ($conn->query($query) === TRUE) {
                DBConnection::getInstance()->closeConnection($conn);
                return true;
            } else {
                echo "Error: " . $query . "<br>" . $conn->error;
                DBConnection::getInstance()->closeConnection($conn);
                return false;
            }
        }

}
