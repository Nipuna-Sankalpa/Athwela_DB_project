<?php

namespace Athwela\EntityBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * OrganizationMobile
 */
class OrganizationMobile
{
    /**
     * @var string
     */
    private $mobileNumber;

    /**
     * @var \Athwela\EntityBundle\Entity\Organization
     */
    private $o;


    /**
     * Set mobileNumber
     *
     * @param string $mobileNumber
     * @return OrganizationMobile
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
     * Set o
     *
     * @param \Athwela\EntityBundle\Entity\Organization $o
     * @return OrganizationMobile
     */
    public function setO(\Athwela\EntityBundle\Entity\Organization $o)
    {
        $this->o = $o;

        return $this;
    }

    /**
     * Get o
     *
     * @return \Athwela\EntityBundle\Entity\Organization 
     */
    public function getO()
    {
        return $this->o;
    }
}
