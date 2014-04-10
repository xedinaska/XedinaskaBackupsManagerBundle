<?php

namespace Xedinaska\BackupsManagerBundle\Service\BackupRunner;

use Xedinaska\BackupsManagerBundle\Service\BackupFacade\BackupInterface;
use Xedinaska\BackupsManagerBundle\Model\BackupManagerInterface;

/**
 * Interface BackupRunnerInterface
 * Backup runners call db backups generating and call classes that save it into actual db
 *
 * @package Xedinaska\BackupsManagerBundle\Service\BackupRunner
 */
interface BackupRunnerInterface
{
    public function __construct(BackupInterface $backupsGenerator, BackupManagerInterface $backupsManager);

    /**
     * Compress database
     * Get archive path
     * Create backup object and save data about it in db
     *
     * @access public
     * @param string backup type
     * @return mixed
     */
    public function makeBackup($type);
}