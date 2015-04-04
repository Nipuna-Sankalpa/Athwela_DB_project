<?php

namespace Athwela\EntityBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Type
 */
class Type {

    /**
     * @var string
     */
    private $name;

    public function setId($id) {
        $this->id = $id;
    }

    /**
     * @var string
     */
    private $description;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $v;

    /**
     * Constructor
     */
    public function __construct() {
        $this->v = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Type
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
     * @return Type
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
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Add v
     *
     * @param \Athwela\EntityBundle\Entity\Volunteer $v
     * @return Type
     */
    public function addV(\Athwela\EntityBundle\Entity\Volunteer $v) {
        $this->v[] = $v;

        return $this;
    }

    /**
     * Remove v
     *
     * @param \Athwela\EntityBundle\Entity\Volunteer $v
     */
    public function removeV(\Athwela\EntityBundle\Entity\Volunteer $v) {
        $this->v->removeElement($v);
    }

    /**
     * Get v
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getV() {
        return $this->v;
    }

}
