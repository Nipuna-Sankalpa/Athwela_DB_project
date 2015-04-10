<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Athwela\AdministratorBundle\Entity;

/**
 * Description of ProjectView
 *
 * @author Yellow Flash
 */
class ProjectView {

    //put your code here
    private $ID;
    private $title;
    private $org_name;
    private $project_status;
    private $duration;
    private $vol_needed;
    private $project_type;

    public function getID() {
        return $this->ID;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getOrg_name() {
        return $this->org_name;
    }

    public function getProject_status() {
        return $this->project_status;
    }

    public function getDuration() {
        return $this->duration;
    }

    public function getVol_needed() {
        return $this->vol_needed;
    }

    public function getProject_type() {
        return $this->project_type;
    }

    public function setID($ID) {
        $this->ID = $ID;
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function setOrg_name($org_name) {
        $this->org_name = $org_name;
    }

    public function setProject_status($project_status) {
        $this->project_status = $project_status;
    }

    public function setDuration($duration) {
        $this->duration = $duration;
    }

    public function setVol_needed($vol_needed) {
        $this->vol_needed = $vol_needed;
    }

    public function setProject_type($project_type) {
        $this->project_type = $project_type;
    }

}
