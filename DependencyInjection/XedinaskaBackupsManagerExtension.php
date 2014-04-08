<?php

namespace Xedinaska\BackupsManagerBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class XedinaskaBackupsManagerExtension extends Extension
{
    /**
     * Load configuration by parameters data
     *
     * @access public
     * @return void
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);


        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');

        $loader->load(sprintf('%s.yml', $config['backups_storage_type']));
        $container->setParameter($this->getAlias() . '.backend_type_' . $config['backups_storage_type'], true);
    }
}
