<?php

namespace Athwela\ProfileSettings\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class AthwelaProfileSettingsUserBundle extends Bundle
{
    public function getParent() {
        return 'FOSUserBundle';
    }
    
}
