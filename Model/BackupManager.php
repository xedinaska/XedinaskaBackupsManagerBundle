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

    /**
     * Find backup by 'created date' field
     *
     * @access public
     * @param \DateTime $created
     * @return mixed|BackupInterface
     */
    public function findBackupByDateCreated(\DateTime $created)
    {
        return $this->findBackupBy(['created' => $created]);
    }

    /**
     * Find backup by passed type
     *
     * @access public
     * @param $type
     * @return mixed|BackupInterface
     */
    public function findBackupByType($type)
    {
        return $this->findBackupBy(['type' => $type]);
    }
}