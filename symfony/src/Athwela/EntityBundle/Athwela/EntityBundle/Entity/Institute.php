<?php

namespace Athwela\EntityBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Institute
 *
 * @ORM\Table(name="institute")
 * @ORM\Entity
 */
class Institute
{
    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=50, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=20, nullable=true)
     */
    private $city;

    /**
     * @var string
     *
     * @ORM\Column(name="country", type="string", length=20, nullable=true)
     */
    private $country;

    /**
     * @var integer
     *
     * @ORM\Column(name="ID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Athwela\EntityBundle\Entity\Volunteer", mappedBy="i")
     */
    private $v;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->v = new \Doctrine\Common\Collections\ArrayCollection();
    }

}
