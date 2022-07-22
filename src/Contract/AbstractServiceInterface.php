<?php

/*
 * This file is part of the Reiterus package.
 *
 * (c) Pavel Vasin <reiterus@yandex.ru>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Reiterus\AppStatsBundle\Contract;

use Symfony\Component\HttpKernel\KernelInterface;

/**
 * @codeCoverageIgnore
 * Interface AbstractServiceInterface
 *
 * @package Reiterus\AppStatsBundle\Contract
 * @author Pavel Vasin <reiterus@yandex.ru>
 */
interface AbstractServiceInterface
{
    /**
     * Get Kernel instance
     *
     * @return KernelInterface
     */
    public function getKernel(): KernelInterface;

    /**
     * Get path to root project folder
     *
     * @return string
     */
    public function getProjectDir(): string;
}
