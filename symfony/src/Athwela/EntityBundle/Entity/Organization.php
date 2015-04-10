<?php

namespace Athwela\EntityBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Organization
 */
class Organization {

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $description;
    private $status;

    public function getStatus() {
        return $this->status;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    public function setId($id) {
        $this->id = $id;
    }

    /**
     * @var string
     */
    private $a_ID;
    private $street;

    /**
     * @var string
     */public function getA_ID() {
        return $this->a_ID;
    }

    public function setA_ID($a_ID) {
        $this->a_ID = $a_ID;
    }

    private $city;

    /**
     * @var string
     */
    private $country;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var \Athwela\EntityBundle\Entity\Admin
     */
    private $a;

    private $email;
    
    
    /**
     * Set name
     *
     * @param string $name
     * @return Organization
     */
    public function setName($name) {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName() {
        return $this->name;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Organization
     */
    public function setDescription($description) {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription() {
        return $this->description;
    }

    /**
     * Set street
     *
     * @param string $street
     * @return Organization
     */
    public function setStreet($street) {
        $this->street = $street;

        return $this;
    }

    /**
     * Get street
     *
     * @return string 
     */
    public function getStreet() {
        return $this->street;
    }

    /**
     * Set city
     *
     * @param string $city
     * @return Organization
     */
    public function setCity($city) {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string 
     */
    public function getCity() {
        return $this->city;
    }

    /**
     * Set country
     *
     * @param string $country
     * @return Organization
     */
    public function setCountry($country) {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return string 
     */
    public function getCountry() {
        return $this->country;
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set a
     *
     * @param \Athwela\EntityBundle\Entity\Admin $a
     * @return Organization
     */
    public function setA($a = null) {
        $this->a = $a;

        return $this;
    }

    /**
     * Get a
     *
     * @return \Athwela\EntityBundle\Entity\Admin 
     */
    public function getA() {
        return $this->a;
    }
    
    function getEmail() {
        return $this->email;
    }

    function setEmail($email) {
        $this->email = $email;
    }


}
