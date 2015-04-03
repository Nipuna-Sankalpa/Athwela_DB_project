<?php

namespace Athwela\EntityBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * OrganiztionEmail
 *
 * @ORM\Table(name="organiztion_email", indexes={@ORM\Index(name="IDX_B0880B4375EB2001", columns={"o_ID"})})
 * @ORM\Entity
 */
class OrganiztionEmail
{
    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=25)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $email;

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
