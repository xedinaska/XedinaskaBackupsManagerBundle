<?php

namespace Xedinaska\BackupsManagerBundle\Tests\Doctrine;

use Xedinaska\BackupsManagerBundle\Doctrine\BackupManager;
use Xedinaska\BackupsManagerBundle\Model\Backup;

/**
 * Class BackupTest
 * @package Xedinaska\BackupsManagerBundle\Tests\Model
 */
class BackupManagerTest extends \PHPUnit_Framework_TestCase
{
    const BACKUP_CLASS = 'Xedinaska\BackupsManagerBundle\Tests\Doctrine\DummyBackup';

    /** @var BackupManager */
    protected $backupManager;

    /**
     * @var \PHPUnit_Framework_MockObject_MockObject
     */
    protected $om;

    /**
     * @var \PHPUnit_Framework_MockObject_MockObject
     */
    protected $repository;

    /**
     * Set-up variables. Check repository / meta / etc
     *
     * @access public
     * @return void
     */
    public function setUp()
    {
        if (!interface_exists('Doctrine\Common\Persistence\ObjectManager')) {
            $this->markTestSkipped('Doctrine Common has to be installed for this test to run.');
        }

        $this->om = $this->getMock('Doctrine\Common\Persistence\ObjectManager');
        $this->repository = $this->getMock('Doctrine\Common\Persistence\ObjectRepository');
        $class = $this->getMock('Doctrine\Common\Persistence\Mapping\ClassMetadata');

        $this->om->expects($this->any())
            ->method('getRepository')
            ->with($this->equalTo(static::BACKUP_CLASS))
            ->will($this->returnValue($this->repository));

        $this->om->expects($this->any())
            ->method('getClassMetadata')
            ->with($this->equalTo(static::BACKUP_CLASS))
            ->will($this->returnValue($class));

        $class->expects($this->any())
            ->method('getName')
            ->will($this->returnValue(static::BACKUP_CLASS));

        $this->backupManager = $this->createBackupManager($this->om, static::BACKUP_CLASS);
    }

    /**
     * Check getClass() method
     *
     * @access public
     * @return void
     */
    public function testGetClass()
    {
        $this->assertEquals(static::BACKUP_CLASS, $this->backupManager->getClass());
    }

    /**
     * Check updating
     *
     * @access public
     * @return void
     */
    public function testUpdateBackup()
    {
        $backup = $this->getBackup();

        $this->om->expects($this->once())->method('persist')
            ->with($this->equalTo($backup));
        $this->om->expects($this->once())->method('flush');

        $this->backupManager->updateBackup($backup);
    }

    /**
     * Check object remove
     *
     * @access public
     * @return void
     */
    public function testRemoveBackup()
    {
        $backup = $this->getBackup();

        $this->om->expects($this->once())->method('remove')
            ->with($this->equalTo($backup));
        $this->om->expects($this->once())->method('flush');

        $this->backupManager->removeBackup($backup);
    }

    /**
     * Check finding
     *
     * @access public
     * @return void
     */
    public function testFindBackupBy()
    {
        $criteria = array("foo" => "bar");

        $this->repository->expects($this->once())
            ->method('findOneBy')
            ->with($this->equalTo($criteria))
            ->will($this->returnValue(array()));

        $this->backupManager->findBackupBy($criteria);
    }

    /**
     * Create backup manager instance
     *
     * @access protected
     * @param $objectManager
     * @param $userClass
     * @return BackupManager
     */
    protected function createBackupManager($objectManager, $userClass)
    {
        return new BackupManager($objectManager, $userClass);
    }

    /**
     * Get dummy backup instance
     *
     * @access protected
     * @return mixed
     */
    protected function getBackup()
    {
        $backup = static::BACKUP_CLASS;

        return new $backup();
    }
}

/**
 * Class DummyBackup
 * Some dummy backup instance
 *
 * @package Xedinaska\BackupsManagerBundle\Tests\Doctrine
 */
class DummyBackup extends Backup
{

}
