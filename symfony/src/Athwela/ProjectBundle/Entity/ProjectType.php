<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Athwela\ProjectBundle\Entity;

/**
 * Description of ProjectType
 *
 * @author Yellow Flash
 */
class ProjectType {

    private $t_ID;
    private $p_ID;
    private $name;
    private $description;

    public function getT_ID() {
        return $this->t_ID;
    }

    public function getP_ID() {
        return $this->p_ID;
    }

    public function getName() {
        return $this->name;
    }

    public function getDescription() {
        return $this->description;
    }

    public function setT_ID($t_ID) {
        $this->t_ID = $t_ID;
    }

    public function setP_ID($p_ID) {
        $this->p_ID = $p_ID;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

}
