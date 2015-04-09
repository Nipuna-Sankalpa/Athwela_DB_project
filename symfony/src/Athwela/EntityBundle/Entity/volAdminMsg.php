<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Athwela\EntityBundle\Entity;

/**
 * Description of volAdminMsg
 *
 * @author Yellow Flash
 */
class volAdminMsg {

    private $orgID;
    private $msg;
    private $date;
    private $status;

    public function getOrgID() {
        return $this->orgID;
    }

    public function getMsg() {
        return $this->msg;
    }

    public function getDate() {
        return $this->date;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setOrgID($orgID) {
        $this->orgID = $orgID;
    }

    public function setMsg($msg) {
        $this->msg = $msg;
    }

    public function setDate($date) {
        $this->date = $date;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

}
