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

    private $type_ID;
    private $project_ID;
    private $name;
    private $description;

    public function gettype_ID() {
        return $this->type_ID;
    }

    public function getproject_ID() {
        return $this->project_ID;
    }

    public function getName() {
        return $this->name;
    }

    public function getDescription() {
        return $this->description;
    }

    public function settype_ID($type_ID) {
        $this->type_ID = $type_ID;
    }

    public function setproject_ID($project_ID) {
        $this->project_ID = $project_ID;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

}
