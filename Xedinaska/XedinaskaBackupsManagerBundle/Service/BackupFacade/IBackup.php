<?php

namespace Xedinaska\BackupsManagerBundle\Service\BackupFacade;

/**
 * Interface IBackup
 *
 * @package Xedinaska\BackupsManagerBundle\Service\BackupFacade
 */
interface IBackup
{
    /**
     * Backup realization here
     *
     * @access public
     * @return mixed
     */
    public function backup();

    /**
     * Return backup archive path
     *
     * @access public
     * @return mixed
     */
    public function getBackupPath();

    /**
     * Get backup size
     *
     * @access public
     * @return mixed
     */
    public function getBackupSize();
}