<?php
/**
 * Created by PhpStorm.
 * User: Pubudu
 * Date: 4/3/2015
 * Time: 1:06 PM
 */

namespace Athwela\EntityBundle\Associations;


class VolunteerProject {

    /**
     * @var \Athwela\EntityBundle\Entity\Volunteer
     */
    private $volunteer;

    /**
     * @var \Athwela\EntityBundle\Entity\Project
     */
    private $project;

    /**
     * @var string
     */
    private $contribution;
    
    /**
     * @var \DateTime
     */
    private $acceptedAt;

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
     * @return string
     */
    public function getContribution()
    {
        return $this->contribution;
    }

    /**
     * @param string $contribution
     */
    public function setContribution($contribution)
    {
        $this->contribution = $contribution;
    }
    
    function getAcceptedAt() {
        return $this->acceptedAt;
    }

    function setAcceptedAt(\DateTime $acceptedAt) {
        $this->acceptedAt = $acceptedAt;
    }
}