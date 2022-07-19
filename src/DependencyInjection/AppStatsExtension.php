<?php

/*
 * This file is part of the Reiterus package.
 *
 * (c) Pavel Vasin <reiterus@yandex.ru>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Reiterus\AppStatsBundle\DependencyInjection;

use Exception;
use \Symfony\Component\Config\FileLocator;
use \Symfony\Component\DependencyInjection\ContainerBuilder;
use \Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use \Symfony\Component\HttpKernel\DependencyInjection\Extension;

/**
 * Bundle extension
 *
 * @package Reiterus\AppStatsBundle\DependencyInjection
 * @author Pavel Vasin <reiterus@yandex.ru>
 */
class AppStatsExtension extends Extension
{
    const ALIAS = 'rts_app_stats';

    /**
     * Get a bundle alias
     *
     * @return string
     */
    public function getAlias(): string
    {
        return self::ALIAS;
    }

    /**
     * @codeCoverageIgnore
     * Loading a specific configuration
     *
     * @throws Exception
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $loader = new XmlFileLoader(
            $container,
            new FileLocator(__DIR__.'/../Resources/config')
        );

        $loader->load('commands.xml');
    }
}
