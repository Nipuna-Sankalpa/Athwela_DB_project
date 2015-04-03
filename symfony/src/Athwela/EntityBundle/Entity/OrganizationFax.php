<?php

namespace Athwela\EntityBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * OrganizationFax
 */
class OrganizationFax
{
    /**
     * @var string
     */
    private $fax;

    /**
     * @var \Athwela\EntityBundle\Entity\Organization
     */
    private $o;


    /**
     * Set fax
     *
     * @param string $fax
     * @return OrganizationFax
     */
    public function setFax($fax)
    {
        $this->fax = $fax;

        return $this;
    }

    /**
     * Get fax
     *
     * @return string 
     */
    public function getFax()
    {
        return $this->fax;
    }

    /**
     * Set o
     *
     * @param \Athwela\EntityBundle\Entity\Organization $o
     * @return OrganizationFax
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
