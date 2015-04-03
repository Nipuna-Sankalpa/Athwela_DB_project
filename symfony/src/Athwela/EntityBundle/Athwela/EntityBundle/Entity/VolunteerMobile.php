<?php

namespace Athwela\EntityBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * VolunteerMobile
 *
 * @ORM\Table(name="volunteer_mobile", indexes={@ORM\Index(name="IDX_6FF2DE0D58FA3814", columns={"v_ID"})})
 * @ORM\Entity
 */
class VolunteerMobile
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
     * @var \Athwela\EntityBundle\Entity\Volunteer
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Athwela\EntityBundle\Entity\Volunteer")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="v_ID", referencedColumnName="ID")
     * })
     */
    private $v;


}
