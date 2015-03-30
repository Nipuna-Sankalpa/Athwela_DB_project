<?php

namespace Athwela\login\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class AthwelaloginUserBundle extends Bundle
{
    public function getParent() {
        return 'FOSUserBundle';
    }
}
