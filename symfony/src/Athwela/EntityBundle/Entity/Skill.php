<?php

namespace Athwela\EntityBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Skill
 */
class Skill {

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $description;

    public function setId($id) {
        $this->id = $id;
    }

    /**
     * @var integer
     */
    private $id;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $v;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $p;

    /**
     * Constructor
     */
    public function __construct() {
        $this->v = new \Doctrine\Common\Collections\ArrayCollection();
        $this->p = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Skill
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
     * @return Skill
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
     * @return Skill
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

    /**
     * Add p
     *
     * @param \Athwela\EntityBundle\Entity\Project $p
     * @return Skill
     */
    public function addP(\Athwela\EntityBundle\Entity\Project $p) {
        $this->p[] = $p;

        return $this;
    }

    /**
     * Remove p
     *
     * @param \Athwela\EntityBundle\Entity\Project $p
     */
    public function removeP(\Athwela\EntityBundle\Entity\Project $p) {
        $this->p->removeElement($p);
    }

    /**
     * Get p
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getP() {
        return $this->p;
    }

}
