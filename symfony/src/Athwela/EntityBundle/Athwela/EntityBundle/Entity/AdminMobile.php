<?php

namespace Athwela\EntityBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AdminMobile
 *
 * @ORM\Table(name="admin_mobile", indexes={@ORM\Index(name="IDX_61BB121995345732", columns={"admin_ID"})})
 * @ORM\Entity
 */
class AdminMobile
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
     * @var \Athwela\EntityBundle\Entity\Admin
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Athwela\EntityBundle\Entity\Admin")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="admin_ID", referencedColumnName="ID")
     * })
     */
    private $a;


}
