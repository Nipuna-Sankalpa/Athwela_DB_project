<?php
namespace Athwela\EntityBundle\Entity;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class OrgAdminMsg
{
    /**
     * @var string
     */
    private $msg;
    
    /**
     * @var \Athwela\EntityBundle\Entity\Organization
     */
    private $org;
    
    /**
     * @var string
     */
    private $status;
    
    /**
     * @var \DateTime
     */
    private $date;
    
    function getDate() {
        return $this->date;
    }

    function setDate(\DateTime $date) {
        $this->date = $date;
    }

    function getMsg() {
        return $this->msg;
    }

    function setMsg($msg) {
        $this->msg = $msg;
    }
    
    function getStatus() {
        return $this->status;
    }
    
    function setStatus($status) {
        $this->status = $status;
    }

     /**
     * Set org
     *
     * @param \Athwela\EntityBundle\Entity\Organization $vol
     */
    public function setV(\Athwela\EntityBundle\Entity\Organization $org)
    {
        $this->org = $org;
        return $this;
    }
    
    /**
     * Get vol
     *
     * @return \Athwela\EntityBundle\Entity\Organization 
     */
    public function getOrg()
    {
        return $this->org;
    }
}