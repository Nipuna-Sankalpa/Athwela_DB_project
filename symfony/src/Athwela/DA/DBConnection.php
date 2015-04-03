<?php

namespace Athwela\DA;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DBConnection
 *
 * @author Yellow Flash
 */
class DBConnection {

//prevent instantiating DBConnection
    private function __construct() {
        
    }

    public static function getInstance() {
        $instance = null;
        if ($instance === null) {
            $instance = new DBConnection();
        }
        return $instance;
    }

    private function __clone() {
        
    }

    private function __wakeup() {
        
    }

    public function connection($host, $username, $password) {
        $connection = mysqli_connect($host, $username, $password,$database);
        return $connection;
    }

}
