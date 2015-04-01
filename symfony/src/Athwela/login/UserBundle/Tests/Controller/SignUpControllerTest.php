<?php

namespace Athwela\login\UserBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class SignUpControllerTest extends WebTestCase
{
    public function testSignup()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/signUp');
    }

}
