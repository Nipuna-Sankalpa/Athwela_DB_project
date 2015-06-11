<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Athwela\ProjectBundle\Entity;

/**
 * Description of RegVols
 *
 * @author Flash
 */
class RegVols {

    private $email;
    private $contribution;
    private $name;
    private $image;

    function getImage() {
        return $this->image;
    }

    function setImage($image) {
        $this->image = $image;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getContribution() {
        return $this->contribution;
    }

    public function getName() {
        return $this->name;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setContribution($contribution) {
        $this->contribution = $contribution;
    }

    public function setName($name) {
        $this->name = $name;
    }

}
