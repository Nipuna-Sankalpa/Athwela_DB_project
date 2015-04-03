<?php
/**
 * Created by PhpStorm.
 * User: Pubudu
 * Date: 4/3/2015
 * Time: 1:28 PM
 */

namespace Athwela\EntityBundle\Associations;


class VolunteerSkill {

    /**
     * @var \Athwela\EntityBundle\Entity\Volunteer
     */
    private $volunteer;

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
     * @return \Athwela\EntityBundle\Entity\Skill
     */
    public function getSkill()
    {
        return $this->skill;
    }

    /**
     * @param \Athwela\EntityBundle\Entity\Skill $skill
     */
    public function setSkill($skill)
    {
        $this->skill = $skill;
    }

    /**
     * @var \Athwela\EntityBundle\Entity\Skill
     */
    private $skill;
}