<?php

/*
 * This file is part of the Reiterus package.
 *
 * (c) Pavel Vasin <reiterus@yandex.ru>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Reiterus\AppStatsBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use Reiterus\AppStatsBundle\DependencyInjection\AppStatsExtension;

/**
 * Bundle class
 *
 * @package Reiterus\AppStatsBundle
 * @author Pavel Vasin <reiterus@yandex.ru>
 */
class AppStatsBundle extends Bundle
{
    /**
     * Get the package container extension
     *
     * @return AppStatsExtension
     */
    public function getContainerExtension(): AppStatsExtension
    {
        if (null === $this->extension) {
            $this->extension = new AppStatsExtension();
        }

        return $this->extension;
    }
}