<?php

namespace Xedinaska\BackupsManagerBundle\Model;

/**
 * Interface BackupManagerInterface
 * Backups Manager interface definition
 *
 * @package Xedinaska\BackupsManagerBundle\Model
 */
interface BackupManagerInterface
{
    /**
     * Create an Backup instance
     *
     * @access public
     * @return mixed
     */
    public function createBackup();

    /**
     * Update an Backup instance
     *
     * @access public
     * @param BackupInterface $backup
     * @return mixed
     */
    public function updateBackup(BackupInterface $backup);

    /**
     * Remove an backup
     *
     * @access public
     * @param BackupInterface $backup
     * @return mixed
     */
    public function removeBackup(BackupInterface $backup);

    /**
     * Find backup by created date
     *
     * @access public
     * @param \DateTime $created
     * @return mixed
     */
    public function findBackupByDateCreated(\DateTime $created);

    /**
     * Find backup by type (auto added or by admin)
     *
     * @access public
     * @param $type
     * @return mixed
     */
    public function findBackupByType($type);

    /**
     * Finds one backup by the given criteria.
     *
     * @param array $criteria
     *
     * @return BackupInterface
     */
    public function findBackupBy(array $criteria);

    /**
     * Returns the backup's fully qualified class name.
     *
     * @return string
     */
    public function getClass();
}