<?php
namespace Xedinaska\BackupsManagerBundle\Doctrine;

use Xedinaska\BackupsManagerBundle\Model\BackupManager as BaseBackupManager;
use Xedinaska\BackupsManagerBundle\Model\BackupInterface;
use Doctrine\Common\Persistence\ObjectManager;

class BackupManager extends BaseBackupManager
{
    protected $class;
    protected $objectManager;
    protected $repository;

    public function __construct(ObjectManager $om, $class)
    {
        $this->objectManager = $om;
        $this->repository = $om->getRepository($class);

        $metadata = $om->getClassMetadata($class);
        $this->class = $metadata->getName();
    }

    public function updateBackup(BackupInterface $backup)
    {
        $this->objectManager->persist($backup);
        $this->objectManager->flush();
    }

    public function removeBackup(BackupInterface $backup) {
        $this->objectManager->remove($backup);
        $this->objectManager->flush();
    }

    public function findBackupBy(array $criteria)
    {
        return $this->repository->findOneBy($criteria);
    }

    public function getClass()
    {
        return $this->class;
    }
}