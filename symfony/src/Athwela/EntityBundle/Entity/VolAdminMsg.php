<?php
namespace Athwela\EntityBundle\Entity;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class VolAdminMsg
{
    /**
     * @var string
     */
    private $msg;
    
    /**
     * @var \Athwela\EntityBundle\Entity\Volunteer
     */
    private $vol;
    
    /**
     * @var string
     */
    private $status;
    
    /**
     * @var \DateTime
     */
    private $timestamp;
            
    function getMsg() {
        return $this->msg;
    }

    function setMsg($msg) {
        $this->msg = $msg;
    }
    
    function getStatus() {
        return $this->status;
    }

    function getTimestamp() {
        return $this->timestamp;
    }

    function setStatus($status) {
        $this->status = $status;
    }

    function setTimestamp(\DateTime $timestamp) {
        $this->timestamp = $timestamp;
    }

     /**
     * Set vol
     *
     * @param \Athwela\EntityBundle\Entity\Volunteer $vol
     * @return VolunteerMobile
     */
    public function setV(\Athwela\EntityBundle\Entity\Volunteer $vol)
    {
        $this->vol = $vol;
        return $this;
    }
    
    /**
     * Get vol
     *
     * @return \Athwela\EntityBundle\Entity\Volunteer 
     */
    public function getVol()
    {
        return $this->vol;
    }
}