<?php

namespace Xedinaska\BackupsManagerBundle\Service\BackupRunner;
use Xedinaska\BackupsManagerBundle\Service\BackupFacade\BackupInterface;
use Xedinaska\BackupsManagerBundle\Model\BackupManagerInterface;

/**
 * Class MongoBackupRunner
 * @package Xedinaska\BackupsManagerBundle\Service\BackupRunner
 */
class MongoBackupRunner implements BackupRunnerInterface
{

    /**
     * @var \Xedinaska\BackupsManagerBundle\Model\BackupManagerInterface
     */
    protected $backupManager;

    /**
     * @var \Xedinaska\BackupsManagerBundle\Service\BackupFacade\BackupInterface
     */
    protected $backupsGenerator;

    /**
     * Set-up mongo backups manager and db backup generator
     *
     * @access public
     * @param BackupInterface $backupsGenerator
     * @param BackupManagerInterface $backupsManager
     */
    public function __construct(BackupInterface $backupsGenerator, BackupManagerInterface $backupsManager)
    {
        $this->backupsGenerator = $backupsGenerator;
        $this->backupManager = $backupsManager;
    }

    /**
     * Compress database
     * Get archive path
     * Create backup object and save data about it in db
     *
     * @access public
     * @param string backup type
     * @return mixed
     */
    public function makeBackup($type)
    {
        $this->backupsGenerator->backup();

        $backup = $this->backupManager->createBackup();
        $backup->setCreated(new \DateTime());
        $backup->setSize($this->backupsGenerator->getBackupSize());
        $backup->setType($type);
        $backup->setPath($this->backupsGenerator->getBackupPath());

        $this->backupManager->updateBackup($backup);
    }
}