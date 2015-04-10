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
    private $msgStatus;
    
    /**
     * @var \DateTime
     */
    private $date;
            
    function getMsg() {
        return $this->msg;
    }

    function setMsg($msg) {
        $this->msg = $msg;
    }
    
    function getMsgStatus() {
        return $this->msgStatus;
    }

    function getDate() {
        return $this->date;
    }

    function setMsgStatus($msgStatus) {
        $this->msgStatus = $msgStatus;
    }

    function setDate(\DateTime $date) {
        $this->date = $date;
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