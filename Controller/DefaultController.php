<?php

namespace Xedinaska\BackupsManagerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {

       /* $mongoBackup = $this->get('xedinaska.mongo_backup');
        $mongoBackup->backup();
        $backupPath = $mongoBackup->getBackupPath();*/



        return $this->render('XedinaskaBackupsManagerBundle:Default:index.html.twig');
    }
}
