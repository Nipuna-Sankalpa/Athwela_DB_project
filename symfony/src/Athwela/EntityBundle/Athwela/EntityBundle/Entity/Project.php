<?php

namespace Athwela\EntityBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Project
 *
 * @ORM\Table(name="project", indexes={@ORM\Index(name="o_ID", columns={"o_ID"}), @ORM\Index(name="t_ID", columns={"t_ID"}), @ORM\Index(name="a_ID", columns={"a_ID"})})
 * @ORM\Entity
 */
class Project
{
    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=15, nullable=false)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=false)
     */
    private $description;

    /**
     * @var integer
     *
     * @ORM\Column(name="status", type="integer", nullable=false)
     */
    private $status;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="start_date", type="date", nullable=false)
     */
    private $startDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="end_date", type="date", nullable=false)
     */
    private $endDate;

    /**
     * @var integer
     *
     * @ORM\Column(name="volunteers_needed", type="integer", nullable=false)
     */
    private $volunteersNeeded;

    /**
     * @var integer
     *
     * @ORM\Column(name="no_of_filled_positions", type="integer", nullable=false)
     */
    private $noOfFilledPositions;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="posted_date", type="date", nullable=false)
     */
    private $postedDate;

    /**
     * @var integer
     *
     * @ORM\Column(name="ID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \Athwela\EntityBundle\Entity\Organization
     *
     * @ORM\ManyToOne(targetEntity="Athwela\EntityBundle\Entity\Organization")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="o_ID", referencedColumnName="ID")
     * })
     */
    private $o;

    /**
     * @var \Athwela\EntityBundle\Entity\Admin
     *
     * @ORM\ManyToOne(targetEntity="Athwela\EntityBundle\Entity\Admin")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="a_ID", referencedColumnName="ID")
     * })
     */
    private $a;

    /**
     * @var \Athwela\EntityBundle\Entity\Type
     *
     * @ORM\ManyToOne(targetEntity="Athwela\EntityBundle\Entity\Type")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="t_ID", referencedColumnName="ID")
     * })
     */
    private $t;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Athwela\EntityBundle\Entity\Volunteer", mappedBy="p")
     */
    private $v;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Athwela\EntityBundle\Entity\Skill", inversedBy="p")
     * @ORM\JoinTable(name="project_skill",
     *   joinColumns={
     *     @ORM\JoinColumn(name="p_ID", referencedColumnName="ID")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="s_ID", referencedColumnName="ID")
     *   }
     * )
     */
    private $s;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->v = new \Doctrine\Common\Collections\ArrayCollection();
        $this->s = new \Doctrine\Common\Collections\ArrayCollection();
    }

}
