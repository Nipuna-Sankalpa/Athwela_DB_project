<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Athwela\AdministratorBundle\Entity;

/**
 * Description of SearchVol
 *
 * @author Yellow Flash
 */
class SearchVol {

    //put your code here
    private $name;
    private $email;
    private $skill;
    private $status;

 
    public function getName() {
        return $this->name;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getSkill() {
        return $this->skill;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setSkill($skill) {
        $this->skill = $skill;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

}
