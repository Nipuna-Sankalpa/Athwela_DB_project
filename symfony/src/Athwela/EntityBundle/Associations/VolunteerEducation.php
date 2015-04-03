<?php

namespace Athwela\EntityBundle\Associations;

class VolunteerEducation {

    /**
     * @var \Athwela\EntityBundle\Entity\Volunteer
     */
    private $volunteer;

    /**
     * @var \Athwela\EntityBundle\Entity\Institute
     */
    private $institute;

    /**
     * @var \DateTime
     */
    private $start_date;

    /**
     * @var \DateTime
     */
    private $end_date;

    /**
     * @var string
     */
    private $qualification;

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
     * @return \Athwela\EntityBundle\Entity\Institute
     */
    public function getInstitute()
    {
        return $this->institute;
    }

    /**
     * @param \Athwela\EntityBundle\Entity\Institute $institute
     */
    public function setInstitute($institute)
    {
        $this->institute = $institute;
    }

    /**
     * @return \DateTime
     */
    public function getStartDate()
    {
        return $this->start_date;
    }

    /**
     * @param \DateTime $start_date
     */
    public function setStartDate($start_date)
    {
        $this->start_date = $start_date;
    }

    /**
     * @return \DateTime
     */
    public function getEndDate()
    {
        return $this->end_date;
    }

    /**
     * @param \DateTime $end_date
     */
    public function setEndDate($end_date)
    {
        $this->end_date = $end_date;
    }

    /**
     * @return string
     */
    public function getQualification()
    {
        return $this->qualification;
    }

    /**
     * @param string $qualification
     */
    public function setQualification($qualification)
    {
        $this->qualification = $qualification;
    }
}