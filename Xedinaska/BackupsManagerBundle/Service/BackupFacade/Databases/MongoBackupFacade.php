<?php

namespace Xedinaska\BackupsManagerBundle\Service\BackupFacade\Databases;

use Xedinaska\BackupsManagerBundle\Service\BackupFacade\AbstractBackup;
use Xedinaska\BackupsManagerBundle\Service\BackupFacade\BackupInterface;
use Dizda\BackupBundle\Databases\MongoDB as DizdaMongoDB;

/**
 * Class MongoDB
 * Facade for dizda (https://github.com/dizda/BackupBundle) MongoDB back-upper
 *
 * @package Xedinaska\BackupsManagerBundle\Service\BackupFacade\Databases
 */
class MongoBackupFacade extends AbstractBackup implements BackupInterface
{
    /**
     * @var DizdaMongoDB Instance
     */
    protected $mongoBackupService;

    public function __construct(DizdaMongoDB $mongoBackupService)
    {
        $this->mongoBackupService = $mongoBackupService;
    }

    /**
     * Use Dizda Service to compress mongo data
     * Data will be dumped and compressed to .tag archive
     *
     * @access public
     * @return $this|mixed
     */
    public function backup()
    {
        //first - dump data to directory
        $this->mongoBackupService->dump();

        //call .tar compressor
        $this->mongoBackupService->compression();

        //remove data path with db dump (not archive)
        $this->mongoBackupService->removeDataPath();

        return $this;
    }

    /**
     * Get archive file path
     *
     * @access public
     * @return mixed|\Xedinaska\BackupsManagerBundle\Service\BackupFacade\backup
     */
    public function getBackupPath()
    {
        $archivePath = $this->mongoBackupService
            ->getArchivePath();

        return str_replace('db/../', '', $archivePath);
    }
}