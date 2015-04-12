<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Athwela\DA\CRUD;

/**
 * Description of Delete
 *
 * @author Yellow Flash
 */
class Delete {

    //put your code here

    private function __construct() {
        
    }

    public static function getInstance() {
        $instance = null;
        if ($instance === null) {
            $instance = new Delete();
        }
        return $instance;
    }

//    pass conn along with table name,name of the column being indexed and value of that particular row(being indexed)

    public function deleteRow($table, $index, $value) {

        $query = "DELETE FROM $table WHERE $index = " . "'" . "$value" . "'";
        $conn = DBConnection::getInstance()->getConnection();
        if ($conn->query($query) === TRUE) {
            return true;
        } else {
            return $conn->error;
        }
    }

}
