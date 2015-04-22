<?php

namespace Athwela\ProjectBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ProjectControllerTest extends WebTestCase
{
    public function testShowproject()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/showProject');
    }

}
