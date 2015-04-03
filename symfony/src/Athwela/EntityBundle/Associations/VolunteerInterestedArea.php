<?php
/**
 * Created by PhpStorm.
 * User: Pubudu
 * Date: 4/3/2015
 * Time: 1:02 PM
 */

namespace Athwela\EntityBundle\Associations;


class VolunteerInterestedArea {

    /**
     * @var \Athwela\EntityBundle\Entity\Volunteer
     */
    private $volunteer;

    /**
     * @var \Athwela\EntityBundle\Entity\Type
     */
    private $type;

    /**
     * @return \Athwela\EntityBundle\Entity\Volunteer
     */
    public function getVolunteer()
    {
        return $this->volunteer;
    }

    /**
     * @param \Athwela\EntityBundle\Entity\Volunteer $volunteer
     */
    public function setVolunteer($volunteer)
    {
        $this->volunteer = $volunteer;
    }

    /**
     * @return \Athwela\EntityBundle\Entity\Type
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param \Athwela\EntityBundle\Entity\Type $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }
}