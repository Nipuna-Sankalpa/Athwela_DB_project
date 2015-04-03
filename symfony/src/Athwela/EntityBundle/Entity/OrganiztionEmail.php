<?php

namespace Athwela\EntityBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * OrganiztionEmail
 */
class OrganiztionEmail
{
    /**
     * @var string
     */
    private $email;

    /**
     * @var \Athwela\EntityBundle\Entity\Organization
     */
    private $o;


    /**
     * Set email
     *
     * @param string $email
     * @return OrganiztionEmail
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set o
     *
     * @param \Athwela\EntityBundle\Entity\Organization $o
     * @return OrganiztionEmail
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
