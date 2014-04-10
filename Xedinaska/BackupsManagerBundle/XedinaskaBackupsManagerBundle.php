<?php

namespace Xedinaska\BackupsManagerBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Doctrine\Bundle\MongoDBBundle\DependencyInjection\Compiler\DoctrineMongoDBMappingsPass;

/**
 * Class XedinaskaBackupsManagerBundle
 * Init bundle class
 *
 * @package Xedinaska\BackupsManagerBundle
 */
class XedinaskaBackupsManagerBundle extends Bundle
{
    /**
     * @param ContainerBuilder $container
     */
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $this->addRegisterMappingsPass($container);
    }

    /**
     * @param ContainerBuilder $container
     */
    private function addRegisterMappingsPass(ContainerBuilder $container)
    {
        // the base class is only available since symfony 2.3
        $symfonyVersion = class_exists('Symfony\Bridge\Doctrine\DependencyInjection\CompilerPass\RegisterMappingsPass');

        $mappings = array(
            realpath(__DIR__ . '/Resources/config/doctrine/model') => 'Xedinaska\BackupsManagerBundle\Model',
        );

        if ($symfonyVersion && class_exists('Doctrine\Bundle\MongoDBBundle\DependencyInjection\Compiler\DoctrineMongoDBMappingsPass')) {
            $container->addCompilerPass(DoctrineMongoDBMappingsPass::createYamlMappingDriver($mappings, array('xedinaska_backups_manager.model_manager_name'), 'xedinaska_backups_manager.backend_type_mongodb'));
        }
    }
}
