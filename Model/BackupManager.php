<?php

namespace Xedinaska\BackupsManagerBundle\Model;

abstract class BackupManager implements BackupManagerInterface
{
    /**
     * Create new backup instance
     *
     * @access public
     * @return mixed
     */
    public function createBackup()
    {
        $class = $this->getClass();
        $backup = new $class;

        return $backup;
    }

    public function findBackupByDateCreated(\DateTime $created)
    {
        return $this->findBackupBy(['created' => $created]);
    }

    public function findBackupByType($type)
    {
        return $this->findBackupBy(['type' => $type]);
    }
}