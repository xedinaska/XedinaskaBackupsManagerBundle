<?php

namespace Xedinaska\BackupsManagerBundle\Controller;

use Domain\CoreBundle\Document\Backup;
use Domain\CoreBundle\Document\User;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {

       /* $mongoBackup = $this->get('xedinaska.mongo_backup');
        $mongoBackup->backup();
        $backupPath = $mongoBackup->getBackupPath();*/

        $backupsManager = $this->get('xedinaska.backups_manager');

        $backup = $backupsManager->createBackup();
        $backup->setCreated(new \DateTime());
        $backup->setSize(1000);
        $backup->setType('auto');
        $backup->setPath(dirname(__FILE__));

        /*$user = new User();
        $user->setEmail('xedinaska@gmail.com');
        $user->setUsername($user->getEmail());
        $user->setEnabled(1);
        $user->setPlainPassword('123123');*/

        /*$userManager = $this->get('fos_user.user_manager');
        $userManager->createUser();*/

        $backupsManager->updateBackup($backup);


        return $this->render('XedinaskaBackupsManagerBundle:Default:index.html.twig');
    }
}
