<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Athwela\ProjectBundle\Entity;

/**
 * Description of ProjectSkill
 *
 * @author Yellow Flash
 */
class ProjectSkill {

    private $ID;
    private $name;
    private $description;

    public function getID() {
        return $this->ID;
    }

    public function getName() {
        return $this->name;
    }

    public function getDescription() {
        return $this->description;
    }

    public function setID($ID) {
        $this->ID = $ID;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

}
