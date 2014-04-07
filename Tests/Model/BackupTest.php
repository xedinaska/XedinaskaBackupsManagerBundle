<?php

namespace Xedinaska\BackupsManagerBundle\Tests\Model;

use Xedinaska\BackupsManagerBundle\Model\Backup;

/**
 * Class BackupTest
 * @package Xedinaska\BackupsManagerBundle\Tests\Model
 */
class BackupTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test path getters / setters
     *
     * @access public
     * @return void
     */
    public function testPath()
    {
        $backup = $this->getBackup();
        $this->assertNull($backup->getPath());

        $backup->setPath('path');
        $this->assertEquals('path', $backup->getPath());
    }

    /**
     * Test type getters / setters
     *
     * @access public
     * @return void
     */
    public function testType()
    {
        $backup = $this->getBackup();
        $this->assertNull($backup->getType());

        $backup->setType('test_type');
        $this->assertEquals('test_type', $backup->getType());
    }

    /**
     * Test size getters / setters
     *
     * @access public
     * @return void
     */
    public function testSize()
    {
        $backup = $this->getBackup();
        $this->assertNull($backup->getSize());

        $backup->setSize(20);
        $this->assertEquals(20, $backup->getSize());
    }

    /**
     * Test created getters / setters
     *
     * @access public
     * @return void
     */
    public function testCreated()
    {
        $backup = $this->getBackup();
        $this->assertNull($backup->getCreated());

        $created = new \DateTime();
        $backup->setCreated($created);
        $this->assertEquals($created, $backup->getCreated());
    }

    /**
     * Get Backup object
     *
     * @access protected
     * @return Backup
     */
    protected function getBackup()
    {
        return $this->getMockForAbstractClass('Xedinaska\BackupsManagerBundle\Model\Backup');
    }
}
