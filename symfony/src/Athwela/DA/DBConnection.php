<?php

namespace Athwela\DA;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Description of DBConnection
 *
 * @author Yellow Flash
 */
class DBConnection extends Controller {

    private $connection;

    //prevent instantiating DBConnection
    private function __construct() {
        $database_host = $this -> container -> getParameter('database_host');
        $database_port = $this -> container -> getParameter('database_port');
        $database_name = $this -> container -> getParameter('database_name');
        $database_user = $this -> container -> getParameter('database_user');
        $database_password = $this -> container -> getParameter('database_password');

        $this -> connection = mysqli_connect($database_host, $database_user, $database_password, $database_name, $database_port);

        if($this -> connection -> connect_error)
            throw new Exception("Connect Error (". $this->db->connect_errno.") ". $this->db->connect_error);
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
        if($this -> connection === null)
            echo "ERROR: Null connection";

        return $this -> connection;
    }

//close dataBase connection
    
    public function closeConnection($conn) {
        $conn->close();
    }

}
