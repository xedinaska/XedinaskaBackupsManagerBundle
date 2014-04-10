<?php

namespace Xedinaska\BackupsManagerBundle\Controller;

use Domain\CoreBundle\Document\Backup;
use Domain\CoreBundle\Document\User;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $backupsManager = $this->get('xedinaska.backups_manager');

        $backups = $backupsManager->findAll();

        return $this->render('XedinaskaBackupsManagerBundle:Default:index.html.twig', [
            'backups' => $backups
        ]);
    }
}
