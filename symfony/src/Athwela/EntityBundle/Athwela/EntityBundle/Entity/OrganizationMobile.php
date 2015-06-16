<?php

namespace Athwela\EntityBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * OrganizationMobile
 *
 * @ORM\Table(name="organization_mobile", indexes={@ORM\Index(name="IDX_39FDF31575EB2001", columns={"organization_ID"})})
 * @ORM\Entity
 */
class OrganizationMobile
{
    /**
     * @var string
     *
     * @ORM\Column(name="mobile_number", type="string", length=20)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $mobileNumber;

    /**
     * @var \Athwela\EntityBundle\Entity\Organization
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Athwela\EntityBundle\Entity\Organization")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="organization_ID", referencedColumnName="ID")
     * })
     */
    private $o;


}
