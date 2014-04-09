<?php

namespace Xedinaska\BackupsManagerBundle\Controller;

use Domain\CoreBundle\Document\Backup;
use Domain\CoreBundle\Document\User;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {

        $mongoBackup = $this->get('xedinaska.mongo_backup');
        $mongoBackup->backup();

        $backupsManager = $this->get('xedinaska.backups_manager');

        $backup = $backupsManager->createBackup();
        $backup->setCreated(new \DateTime());
        $backup->setSize($mongoBackup->getBackupSize());
        $backup->setType('auto');
        $backup->setPath($mongoBackup->getBackupPath());

        $backupsManager->updateBackup($backup);

        return $this->render('XedinaskaBackupsManagerBundle:Default:index.html.twig');
    }
}
