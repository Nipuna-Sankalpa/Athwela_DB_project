<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Athwela\AdministratorBundle\Entity;

/**
 * Description of AdminOrgMsg
 *
 * @author Yellow Flash
 */
class AdminOrgMsg {

    private $timeStamp;
    private $status;
    private $name;
    private $fakeTS;
    private $msg;

    public function getMsg() {
        return $this->msg;
    }

    public function setMsg($msg) {
        $this->msg = $msg;
    }

    public function getFakeTS() {
        return $this->fakeTS;
    }

    public function setFakeTS($fakeTS) {
        $this->fakeTS = $fakeTS;
    }

    public function getTimeStamp() {
        return $this->timeStamp;
    }

    public function getStatus() {
        return $this->status;
    }

    public function getName() {
        return $this->name;
    }

    public function setTimeStamp($timeStamp) {
        $this->timeStamp = $timeStamp;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    public function setName($name) {
        $this->name = $name;
    }

}
