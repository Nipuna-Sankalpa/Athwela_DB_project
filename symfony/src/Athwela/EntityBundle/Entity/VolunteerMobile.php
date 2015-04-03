<?php

namespace Athwela\EntityBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * VolunteerMobile
 */
class VolunteerMobile
{
    /**
     * @var string
     */
    private $mobileNumber;

    /**
     * @var \Athwela\EntityBundle\Entity\Volunteer
     */
    private $v;


    /**
     * Set mobileNumber
     *
     * @param string $mobileNumber
     * @return VolunteerMobile
     */
    public function setMobileNumber($mobileNumber)
    {
        $this->mobileNumber = $mobileNumber;

        return $this;
    }

    /**
     * Get mobileNumber
     *
     * @return string 
     */
    public function getMobileNumber()
    {
        return $this->mobileNumber;
    }

    /**
     * Set v
     *
     * @param \Athwela\EntityBundle\Entity\Volunteer $v
     * @return VolunteerMobile
     */
    public function setV(\Athwela\EntityBundle\Entity\Volunteer $v)
    {
        $this->v = $v;

        return $this;
    }

    /**
     * Get v
     *
     * @return \Athwela\EntityBundle\Entity\Volunteer 
     */
    public function getV()
    {
        return $this->v;
    }
}
