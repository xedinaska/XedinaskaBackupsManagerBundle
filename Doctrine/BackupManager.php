<?php
namespace Xedinaska\BackupsManagerBundle\Doctrine;

use Xedinaska\BackupsManagerBundle\Model\BackupManager as BaseBackupManager;
use Xedinaska\BackupsManagerBundle\Model\BackupInterface;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Class BackupManager
 * Manager for backup documents
 * Used to hide backups data storage
 *
 * @package Xedinaska\BackupsManagerBundle\Doctrine
 */
class BackupManager extends BaseBackupManager
{
    /**
     * @var string class for used document / entity
     */
    protected $class;

    /**
     * @var \Doctrine\Common\Persistence\ObjectManager Object manager for current db scheme
     */
    protected $objectManager;

    /**
     * @var \Doctrine\Common\Persistence\ObjectRepository Object repository for current db scheme
     */
    protected $repository;

    /**
     * Set-up variables
     *
     * @access public
     * @param ObjectManager $om
     * @param $class
     */
    public function __construct(ObjectManager $om, $class)
    {
        $this->objectManager = $om;
        $this->repository = $om->getRepository($class);

        $metadata = $om->getClassMetadata($class);
        $this->class = $metadata->getName();
    }

    /**
     * Update backup object
     *
     * @access public
     * @param BackupInterface $backup
     * @return mixed|void
     */
    public function updateBackup(BackupInterface $backup)
    {
        $this->objectManager->persist($backup);
        $this->objectManager->flush();
    }

    /**
     * Remove backup object
     *
     * @access public
     * @param BackupInterface $backup
     * @return mixed|void
     */
    public function removeBackup(BackupInterface $backup) {
        $this->objectManager->remove($backup);
        $this->objectManager->flush();
    }

    /**
     * Find backup by passed criteria
     *
     * @access public
     * @param array $criteria
     * @return object|BackupInterface
     */
    public function findBackupBy(array $criteria)
    {
        return $this->repository->findOneBy($criteria);
    }

    /**
     * Get name of used backup class
     *
     * @access public
     * @return string
     */
    public function getClass()
    {
        return $this->class;
    }
}