<?php

namespace Athwela\EntityBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Organization
 *
 * @ORM\Table(name="organization", indexes={@ORM\Index(name="a_ID", columns={"a_ID"})})
 * @ORM\Entity
 */
class Organization
{
    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=20, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=false)
     */
    private $description;

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
     *   @ORM\JoinColumn(name="a_ID", referencedColumnName="ID")
     * })
     */
    private $a;


}
