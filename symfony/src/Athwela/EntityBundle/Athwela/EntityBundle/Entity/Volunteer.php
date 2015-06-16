<?php

namespace Athwela\EntityBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Volunteer
 *
 * @ORM\Table(name="volunteer", indexes={@ORM\Index(name="admin_ID", columns={"admin_ID"})})
 * @ORM\Entity
 */
class Volunteer
{
    /**
     * @var string
     *
     * @ORM\Column(name="first_name", type="string", length=15, nullable=false)
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="last_name", type="string", length=15, nullable=false)
     */
    private $lastName;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dob", type="date", nullable=false)
     */
    private $dob;

    /**
     * @var string
     *
     * @ORM\Column(name="street", type="string", length=20, nullable=false)
     */
    private $street;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=15, nullable=false)
     */
    private $city;

    /**
     * @var string
     *
     * @ORM\Column(name="country", type="string", length=15, nullable=false)
     */
    private $country;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=25, nullable=false)
     */
    private $email;

    /**
     * @var boolean
     *
     * @ORM\Column(name="gender", type="boolean", nullable=false)
     */
    private $gender;

    /**
     * @var integer
     *
     * @ORM\Column(name="availability", type="integer", nullable=false)
     */
    private $availability;

    /**
     * @var integer
     *
     * @ORM\Column(name="ID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \Athwela\EntityBundle\Entity\Admin
     *
     * @ORM\ManyToOne(targetEntity="Athwela\EntityBundle\Entity\Admin")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="admin_ID", referencedColumnName="ID")
     * })
     */
    private $a;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Athwela\EntityBundle\Entity\Skill", inversedBy="v")
     * @ORM\JoinTable(name="volunteer_skill",
     *   joinColumns={
     *     @ORM\JoinColumn(name="volunteer_ID", referencedColumnName="ID")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="skill_ID", referencedColumnName="ID")
     *   }
     * )
     */
    private $s;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Athwela\EntityBundle\Entity\Project", inversedBy="v")
     * @ORM\JoinTable(name="volunteer_project",
     *   joinColumns={
     *     @ORM\JoinColumn(name="volunteer_ID", referencedColumnName="ID")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="project_ID", referencedColumnName="ID")
     *   }
     * )
     */
    private $p;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Athwela\EntityBundle\Entity\Type", inversedBy="v")
     * @ORM\JoinTable(name="volunteer_interested_area",
     *   joinColumns={
     *     @ORM\JoinColumn(name="volunteer_ID", referencedColumnName="ID")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="type_ID", referencedColumnName="ID")
     *   }
     * )
     */
    private $t;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Athwela\EntityBundle\Entity\Institute", inversedBy="v")
     * @ORM\JoinTable(name="volunteer_education",
     *   joinColumns={
     *     @ORM\JoinColumn(name="volunteer_ID", referencedColumnName="ID")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="institute_ID", referencedColumnName="ID")
     *   }
     * )
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

}
