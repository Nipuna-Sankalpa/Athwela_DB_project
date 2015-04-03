<?php

namespace Athwela\EntityBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * OrganizationFax
 *
 * @ORM\Table(name="organization_fax", indexes={@ORM\Index(name="IDX_9BAE928B75EB2001", columns={"o_ID"})})
 * @ORM\Entity
 */
class OrganizationFax
{
    /**
     * @var string
     *
     * @ORM\Column(name="fax", type="string", length=20)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $fax;

    /**
     * @var \Athwela\EntityBundle\Entity\Organization
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Athwela\EntityBundle\Entity\Organization")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="o_ID", referencedColumnName="ID")
     * })
     */
    private $o;


}
