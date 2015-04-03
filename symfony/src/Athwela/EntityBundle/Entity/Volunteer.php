<?php

namespace Athwela\EntityBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Volunteer
 */
class Volunteer
{
    /**
     * @var string
     */
    private $firstName;

    /**
     * @var string
     */
    private $lastName;

    /**
     * @var \DateTime
     */
    private $dob;

    /**
     * @var string
     */
    private $street;

    /**
     * @var string
     */
    private $city;

    /**
     * @var string
     */
    private $country;

    /**
     * @var string
     */
    private $email;

    /**
     * @var boolean
     */
    private $gender;

    /**
     * @var integer
     */
    private $availability;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var \Athwela\EntityBundle\Entity\Admin
     */
    private $a;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $s;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $p;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $t;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $i;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->s = new \Doctrine\Common\Collections\ArrayCollection();
        $this->p = new \Doctrine\Common\Collections\ArrayCollection();
        $this->t = new \Doctrine\Common\Collections\ArrayCollection();
        $this->i = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set firstName
     *
     * @param string $firstName
     * @return Volunteer
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string 
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     * @return Volunteer
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string 
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set dob
     *
     * @param \DateTime $dob
     * @return Volunteer
     */
    public function setDob($dob)
    {
        $this->dob = $dob;

        return $this;
    }

    /**
     * Get dob
     *
     * @return \DateTime 
     */
    public function getDob()
    {
        return $this->dob;
    }

    /**
     * Set street
     *
     * @param string $street
     * @return Volunteer
     */
    public function setStreet($street)
    {
        $this->street = $street;

        return $this;
    }

    /**
     * Get street
     *
     * @return string 
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * Set city
     *
     * @param string $city
     * @return Volunteer
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string 
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set country
     *
     * @param string $country
     * @return Volunteer
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return string 
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Volunteer
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
     * Set gender
     *
     * @param boolean $gender
     * @return Volunteer
     */
    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Get gender
     *
     * @return boolean 
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set availability
     *
     * @param integer $availability
     * @return Volunteer
     */
    public function setAvailability($availability)
    {
        $this->availability = $availability;

        return $this;
    }

    /**
     * Get availability
     *
     * @return integer 
     */
    public function getAvailability()
    {
        return $this->availability;
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set a
     *
     * @param \Athwela\EntityBundle\Entity\Admin $a
     * @return Volunteer
     */
    public function setA(\Athwela\EntityBundle\Entity\Admin $a = null)
    {
        $this->a = $a;

        return $this;
    }

    /**
     * Get a
     *
     * @return \Athwela\EntityBundle\Entity\Admin 
     */
    public function getA()
    {
        return $this->a;
    }

    /**
     * Add s
     *
     * @param \Athwela\EntityBundle\Entity\Skill $s
     * @return Volunteer
     */
    public function add(\Athwela\EntityBundle\Entity\Skill $s)
    {
        $this->s[] = $s;

        return $this;
    }

    /**
     * Remove s
     *
     * @param \Athwela\EntityBundle\Entity\Skill $s
     */
    public function remove(\Athwela\EntityBundle\Entity\Skill $s)
    {
        $this->s->removeElement($s);
    }

    /**
     * Get s
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getS()
    {
        return $this->s;
    }

    /**
     * Add p
     *
     * @param \Athwela\EntityBundle\Entity\Project $p
     * @return Volunteer
     */
    public function addP(\Athwela\EntityBundle\Entity\Project $p)
    {
        $this->p[] = $p;

        return $this;
    }

    /**
     * Remove p
     *
     * @param \Athwela\EntityBundle\Entity\Project $p
     */
    public function removeP(\Athwela\EntityBundle\Entity\Project $p)
    {
        $this->p->removeElement($p);
    }

    /**
     * Get p
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getP()
    {
        return $this->p;
    }

    /**
     * Add t
     *
     * @param \Athwela\EntityBundle\Entity\Type $t
     * @return Volunteer
     */
    public function addT(\Athwela\EntityBundle\Entity\Type $t)
    {
        $this->t[] = $t;

        return $this;
    }

    /**
     * Remove t
     *
     * @param \Athwela\EntityBundle\Entity\Type $t
     */
    public function removeT(\Athwela\EntityBundle\Entity\Type $t)
    {
        $this->t->removeElement($t);
    }

    /**
     * Get t
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getT()
    {
        return $this->t;
    }

    /**
     * Add i
     *
     * @param \Athwela\EntityBundle\Entity\Institute $i
     * @return Volunteer
     */
    public function addI(\Athwela\EntityBundle\Entity\Institute $i)
    {
        $this->i[] = $i;

        return $this;
    }

    /**
     * Remove i
     *
     * @param \Athwela\EntityBundle\Entity\Institute $i
     */
    public function removeI(\Athwela\EntityBundle\Entity\Institute $i)
    {
        $this->i->removeElement($i);
    }

    /**
     * Get i
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getI()
    {
        return $this->i;
    }
}
