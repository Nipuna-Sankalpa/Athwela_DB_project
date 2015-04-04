<?php

namespace Athwela\DA\Entity;

use Athwela\DA\DBConnection;

class AdminDA {
    
    
    private function __construct() {
        
    }

    public static function getInstance() {
        $instance = null;
        if ($instance === null) {
            $instance = new AdminDA();
        }
        return $instance;
    }
//
    
    public function addAdmin($conn, $id, $firstName, $lastName, $street, $city, $country, $email) {

        $query = "INSERT INTO admin values($id,'$firstName','$lastName','$street','$city','$country','$email') ";
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            return false;
        }
        if ($conn->query($query) === TRUE) {
            return true;
        } else {
            echo "Error: " . $query . "<br>" . $conn->error;
            return false;
        }
    }

}
