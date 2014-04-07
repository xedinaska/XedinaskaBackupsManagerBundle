<?php

namespace Xedinaska\BackupsManagerBundle\Service\BackupFacade;

abstract class AbstractBackup implements IBackup
{
    /**
     * @var backup archive file
     */
    protected $backupPath;

    /**
     * @var directory for backup archive file
     */
    protected $backupsDirectory;

    /**
     * Abstract function
     * Override this to create database back-uping
     *
     * @access public
     * @return mixed
     */
    public abstract function backup();

    /**
     * Get path of backup file
     *
     * @access public
     * @return backup
     */
    public function getBackupPath()
    {
        return $this->backupPath;
    }

    /**
     * Set-up directory for backups
     *
     * @access protected
     * @param null $backupsDirectory
     * @return $this
     */
    protected function setBackupsDirectory($backupsDirectory = null)
    {
        if (!$backupsDirectory) {
            $this->backupsDirectory = '';

            return $this;
        }

        $this->backupsDirectory = $backupsDirectory;

        return $this;
    }

    /**
     * Get current backups directory path
     *
     * @access protected
     * @return string
     */
    protected function getBackupsDirectory()
    {
        return $this->backupsDirectory;
    }
}