<?php

namespace Athwela\login\UserBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DataBaseControllerTest extends WebTestCase
{
    public function testDatabase()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/dataBase');
    }

}
