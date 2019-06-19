<?php

namespace Guave\Visualradio\DependencyInjection;

use Exception;
use InvalidArgumentException;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

class VisualradioExtension extends Extension
{

    /**
     * Loads a specific configuration.
     *
     * @param array            $configs
     * @param ContainerBuilder $container
     *
     * @throws InvalidArgumentException When provided tag is not defined in this extension
     * @throws Exception
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $loader = new YamlFileLoader(
            $container,
            new FileLocator(__DIR__.'/../Resources/config')
        );

        //$loader->load('listener.yml');
        $loader->load('services.yml');
    }
}