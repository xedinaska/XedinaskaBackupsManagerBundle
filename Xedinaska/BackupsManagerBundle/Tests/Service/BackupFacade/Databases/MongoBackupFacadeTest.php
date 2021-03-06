<?php

namespace Domain\AdminBundle\Tests\Service\BackupFacade\Databases;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * Class MongoBackupFacadeTest
 * Tests for users pages
 *
 * @package Domain\AdminBundle\Tests\Controller
 */
class MongoBackupFacadeTest extends WebTestCase
{
    /**
     * Check campaigns list page
     *
     * @access public
     * @return void
     */
    public function testBackupFileGenerating()
    {
        $client = static::createClient();

        $mongoBackup = $client->getContainer()
            ->get('xedinaska.mongo_backup');

        $mongoBackup->backup();
        $backupPath = $mongoBackup->getBackupPath();

        $this->assertTrue(strlen($backupPath) > 0);
    }
}
