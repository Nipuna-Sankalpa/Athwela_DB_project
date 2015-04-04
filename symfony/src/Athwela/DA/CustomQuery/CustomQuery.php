<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Athwela\DA\CustomQuery;

/**
 * Description of CustomQuery
 *
 * @author Yellow Flash
 */
class CustomQuery {

    private function __construct() {
        
    }

    public static function getInstance() {
        $instance = null;
        if ($instance === null) {
            $instance = new CustomQuery();
        }
        return $instance;
    }

    public function customQuery($conn, $query) {
        $result = $conn->query($query);

        if ($result) {
            return $result;
        } else {
            die($conn->error);
        }
    }

}
