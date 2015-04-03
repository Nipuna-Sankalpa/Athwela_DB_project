<?php
/**
 * Created by PhpStorm.
 * User: Pubudu
 * Date: 4/3/2015
 * Time: 12:32 PM
 */

namespace Athwela\EntityBundle\Associations;

class ProjectSkill {
    /**
     * @var \Athwela\EntityBundle\Entity\Project
     */
    private $project;

    /**
     * @var \Athwela\EntityBundle\Entity\Skill
     */
    private $skill;

    /**
     * @return \Athwela\EntityBundle\Entity\Project
     */
    public function getProject()
    {
        return $this->project;
    }

    /**
     * @param \Athwela\EntityBundle\Entity\Project $project
     */
    public function setProject($project)
    {
        $this->project = $project;
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
}