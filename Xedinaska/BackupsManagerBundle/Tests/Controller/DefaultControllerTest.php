<?php

namespace Xedinaska\BackupsManagerBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * Class DefaultControllerTest
 * Check test controller created for bundle
 *
 * @package Xedinaska\BackupsManagerBundle\Tests\Controller
 */
class DefaultControllerTest extends WebTestCase
{
    /**
     * Check that page available
     *
     * @access public
     * @return void
     */
    public function testIndex()
    {
        $client = static::createClient();

        $client->request('GET', '/backups');

        $responseCode = $client->getResponse()
            ->getStatusCode();

        $this->assertTrue($responseCode == 200);
    }
}
