<?php

namespace Athwela\EntityBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AdminMobile
 */
class AdminMobile
{
    /**
     * @var string
     */
    private $mobileNumber;

    /**
     * @var \Athwela\EntityBundle\Entity\Admin
     */
    private $a;


    /**
     * Set mobileNumber
     *
     * @param string $mobileNumber
     * @return AdminMobile
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
     * Set a
     *
     * @param \Athwela\EntityBundle\Entity\Admin $a
     * @return AdminMobile
     */
    public function setA(\Athwela\EntityBundle\Entity\Admin $a)
    {
        $this->a = $a;

        return $this;
    }

    /**
     * Get a
     *
     * @return \Athwela\EntityBundle\Entity\Admin 
     */
    public function getA()
    {
        return $this->a;
    }
}
