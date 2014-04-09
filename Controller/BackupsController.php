<?php

namespace Xedinaska\BackupsManagerBundle\Controller;

use Symfony\Component\Console\Input\ArgvInput;
use Symfony\Component\Console\Output\ConsoleOutput;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class BackupsController
 * @package Xedinaska\BackupsManagerBundle\Controller
 */
class BackupsController extends Controller
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        $backupsManager = $this->get('xedinaska.backups_manager');

        $backups = $backupsManager->findAll();

        return $this->render('XedinaskaBackupsManagerBundle:Default:index.html.twig', [
            'backups' => $backups
        ]);
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function addAction()
    {
        $type = 'manual';

        $backupRunner = $this->get('xedinaska.backup_runner_service');
        $backupRunner->makeBackup($type);

        return $this->redirect($this->generateUrl('xedinaska_backups_manager_homepage'));
    }
}
