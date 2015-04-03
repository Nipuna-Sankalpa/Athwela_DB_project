<?php

// src/Acme/UserBundle/Entity/User.php

namespace Athwela\login\UserBundle\Entity;

use FOS\UserBundle\Entity\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    protected $status;

    public function getstatus() {
        return $this->status;
    }

    public function setstatus($status) {
        echo $status;
        if ($status == 'ROLE_ORG') {

            $this->setRoles(array('ROLE_ORG'));
        } else if ($status == 'ROLE_VOL') {
            $this->setRoles(array('ROLE_VOL'));
        } else if ($status == 'ROLE_SUPER_ADMIN') {
            $this->setRoles(array('ROLE_SUPER_ADMIN'));
        }
    }

}
