<?php

namespace Xedinaska\BackupsManagerBundle\Tests\Model;

use Xedinaska\BackupsManagerBundle\Model\BackupManager;

/**
 * Class BackupManagerTest
 *
 * @package Xedinaska\BackupsManagerBundle\Tests\Model
 */
class BackupManagerTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var BackupManager
     */
    protected $manager;

    public function setUp()
    {
        $this->manager = $this->getBackupManager();
    }

    /**
     * Check find backup by created date function
     *
     * @access public
     * @return void
     */
    public function testFindBackupByDateCreated()
    {
        $created = new \DateTime();

        $this->manager->expects($this->once())
            ->method('findBackupBy')
            ->with($this->equalTo(array('created' => $created)));

        $this->manager->findBackupByDateCreated($created);
    }

    /**
     * Check find backup by type function
     *
     * @access public
     * @return void
     */
    public function testFindBackupByType()
    {
        $this->manager->expects($this->once())
            ->method('findBackupBy')
            ->with($this->equalTo(array('type' => 'test')));

        $this->manager->findBackupByType('test');
    }

    /**
     * Get mock for backup manager
     *
     * @access public
     * @return \PHPUnit_Framework_MockObject_MockObject
     */
    public function getBackupManager()
    {
        return $this->getMockBuilder('Xedinaska\BackupsManagerBundle\Model\BackupManager')
            ->getMockForAbstractClass();
    }
}
