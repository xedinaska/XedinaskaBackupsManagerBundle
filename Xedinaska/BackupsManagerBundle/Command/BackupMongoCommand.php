<?php

namespace Xedinaska\BackupsManagerBundle\Command;

use Xedinaska\BackupsManagerBundle\Model\Backup;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class Run
 * @package Domain\Core\Service\Queue\Commands
 */
class BackupMongoCommand extends Command
{
    /**
     * @var null|string
     */
    protected $config;

    /**
     * Set-up runner command
     */
    protected function configure()
    {
        $this->setName('mongo:db:backup')
            ->setDescription('Backup mongo database')
            ->addOption('type', null, InputOption::VALUE_OPTIONAL, 'Queue name', Backup::AUTO_BACKUP_TYPE)
        ;
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int|null|void
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $container = $this->getApplication()->getKernel()->getContainer();

        $type = $input->getOption('type');

        $output->writeln('<comment>Start mongo database backup:</comment>');

        $backupRunner = $container->get('xedinaska.backup_runner_service');
        $backupRunner->makeBackup($type);

        $output->writeln('<comment>Done.</comment>');
    }
}