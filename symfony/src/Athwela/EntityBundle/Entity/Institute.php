<?php

namespace Athwela\EntityBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Institute
 */
class Institute
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
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
     * @var \Doctrine\Common\Collections\Collection
     */
    private $v;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->v = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Institute
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set city
     *
     * @param string $city
     * @return Institute
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string 
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set country
     *
     * @param string $country
     * @return Institute
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return string 
     */
    public function getCountry()
    {
        return $this->country;
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
     * Add v
     *
     * @param \Athwela\EntityBundle\Entity\Volunteer $v
     * @return Institute
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
}
