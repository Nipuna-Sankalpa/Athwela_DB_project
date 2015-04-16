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
        static $instance = null;
        if ($instance === null) {
            $instance = new DBConnection();
        }
        return $instance;
    }

    private function __clone() {
        
    }

    private function __wakeup() {
        
    }

//open a connection with athwela dataBase

    public function getConnection() {

        $connection = mysqli_connect('localhost', 'root', '', 'athwela');

        if ($connection) {
            return $connection;
        } else {
            die($connection->error);
        }
    }

//close dataBase connection

    public function closeConnection($conn) {
        $conn->close();
    }

}
