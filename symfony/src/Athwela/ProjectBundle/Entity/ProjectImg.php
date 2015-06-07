<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Athwela\ProjectBundle\Entity;

/**
 * Description of ProjectImg
 *
 * @author Yellow Flash
 */
class ProjectImg {

    private $ID;
    private $URL;
    private $Code;
    private $caption;

    public function getCaption() {
        return $this->caption;
    }

    public function setCaption($caption) {
        $this->caption = $caption;
    }

    public function getID() {
        return $this->ID;
    }

    public function getURL() {
        return $this->URL;
    }

    public function getCode() {
        return $this->Code;
    }

    public function setID($ID) {
        $this->ID = $ID;
    }

    public function setURL($URL) {
        $this->URL = $URL;
    }

    public function setCode($Code) {
        $this->Code = $Code;
    }

}
