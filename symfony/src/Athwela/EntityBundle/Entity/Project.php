<?php

namespace Athwela\EntityBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Project
 */
class Project
{
    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $description;

    /**
     * @var integer
     */
    private $status;

    /**
     * @var \DateTime
     */
    private $startDate;
    public function getO_ID() {
        return $this->o_ID;
    }

    public function getA_ID() {
        return $this->a_ID;
    }

    public function getT_ID() {
        return $this->t_ID;
    }

    public function setO_ID($o_ID) {
        $this->o_ID = $o_ID;
    }

    public function setA_ID($a_ID) {
        $this->a_ID = $a_ID;
    }

    public function setT_ID($t_ID) {
        $this->t_ID = $t_ID;
    }

        /**
     * @var \DateTime
     */
    private $endDate;

    /**
     * @var integer
     */
    private $volunteersNeeded;

    /**
     * @var integer
     */
    private $noOfFilledPositions;

    /**
     * @var \DateTime
     */
    private $postedDate;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var \Athwela\EntityBundle\Entity\Organization
     */
    private $o_ID;

    /**
     * @var \Athwela\EntityBundle\Entity\Admin
     */
    private $a_ID;

    /**
     * @var \Athwela\EntityBundle\Entity\Type
     */
    private $t_ID;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $v;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $s;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->v = new \Doctrine\Common\Collections\ArrayCollection();
        $this->s = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Project
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Project
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set status
     *
     * @param integer $status
     * @return Project
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return integer 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set startDate
     *
     * @param \DateTime $startDate
     * @return Project
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;

        return $this;
    }

    /**
     * Get startDate
     *
     * @return \DateTime 
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * Set endDate
     *
     * @param \DateTime $endDate
     * @return Project
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;

        return $this;
    }

    /**
     * Get endDate
     *
     * @return \DateTime 
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * Set volunteersNeeded
     *
     * @param integer $volunteersNeeded
     * @return Project
     */
    public function setVolunteersNeeded($volunteersNeeded)
    {
        $this->volunteersNeeded = $volunteersNeeded;

        return $this;
    }

    /**
     * Get volunteersNeeded
     *
     * @return integer 
     */
    public function getVolunteersNeeded()
    {
        return $this->volunteersNeeded;
    }

    /**
     * Set noOfFilledPositions
     *
     * @param integer $noOfFilledPositions
     * @return Project
     */
    public function setNoOfFilledPositions($noOfFilledPositions)
    {
        $this->noOfFilledPositions = $noOfFilledPositions;

        return $this;
    }

    /**
     * Get noOfFilledPositions
     *
     * @return integer 
     */
    public function getNoOfFilledPositions()
    {
        return $this->noOfFilledPositions;
    }

    /**
     * Set postedDate
     *
     * @param \DateTime $postedDate
     * @return Project
     */
    public function setPostedDate($postedDate)
    {
        $this->postedDate = $postedDate;

        return $this;
    }

    /**
     * Get postedDate
     *
     * @return \DateTime 
     */
    public function getPostedDate()
    {
        return $this->postedDate;
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set o
     *
     * @param \Athwela\EntityBundle\Entity\Organization $o
     * @return Project
     */
    public function setO(\Athwela\EntityBundle\Entity\Organization $o = null)
    {
        $this->o_ID = $o;

        return $this;
    }

    /**
     * Get o
     *
     * @return \Athwela\EntityBundle\Entity\Organization 
     */
    public function getO()
    {
        return $this->o_ID;
    }

    /**
     * Set a
     *
     * @param \Athwela\EntityBundle\Entity\Admin $a
     * @return Project
     */
    public function setA(\Athwela\EntityBundle\Entity\Admin $a = null)
    {
        $this->a_ID = $a;

        return $this;
    }

    /**
     * Get a
     *
     * @return \Athwela\EntityBundle\Entity\Admin 
     */
    public function getA()
    {
        return $this->a_ID;
    }

    /**
     * Set t
     *
     * @param \Athwela\EntityBundle\Entity\Type $t
     * @return Project
     */
    public function setT(\Athwela\EntityBundle\Entity\Type $t = null)
    {
        $this->t_ID = $t;

        return $this;
    }

    /**
     * Get t
     *
     * @return \Athwela\EntityBundle\Entity\Type 
     */
    public function getT()
    {
        return $this->t_ID;
    }

    /**
     * Add v
     *
     * @param \Athwela\EntityBundle\Entity\Volunteer $v
     * @return Project
     */
    public function addV(\Athwela\EntityBundle\Entity\Volunteer $v)
    {
        $this->v[] = $v;

        return $this;
    }

    /**
     * Remove v
     *
     * @param \Athwela\EntityBundle\Entity\Volunteer $v
     */
    public function removeV(\Athwela\EntityBundle\Entity\Volunteer $v)
    {
        $this->v->removeElement($v);
    }

    /**
     * Get v
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getV()
    {
        return $this->v;
    }

    /**
     * Add s
     *
     * @param \Athwela\EntityBundle\Entity\Skill $s
     * @return Project
     */
    public function add(\Athwela\EntityBundle\Entity\Skill $s)
    {
        $this->s[] = $s;

        return $this;
    }

    /**
     * Remove s
     *
     * @param \Athwela\EntityBundle\Entity\Skill $s
     */
    public function remove(\Athwela\EntityBundle\Entity\Skill $s)
    {
        $this->s->removeElement($s);
    }

    /**
     * Get s
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getS()
    {
        return $this->s;
    }
    /**
     * @var \Athwela\EntityBundle\Entity\Organization
     */
    private $o;

    /**
     * @var \Athwela\EntityBundle\Entity\Admin
     */
    private $a;

    /**
     * @var \Athwela\EntityBundle\Entity\Type
     */
    private $t;


}
