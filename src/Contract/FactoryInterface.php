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
 * Interface FactoryInterface
 *
 * @package Reiterus\AppStatsBundle\Contract
 * @author Pavel Vasin <reiterus@yandex.ru>
 */
interface FactoryInterface
{
    /**
     * Get KernelInterface instance
     *
     * @return KernelInterface
     */
    public function kernel(): KernelInterface;

    /**
     * Get HelperInterface instance
     *
     * @return HelperInterface
     */
    public function helper(): HelperInterface;

    /**
     * Get FileInterface instance
     *
     * @return FilesInterface
     */
    public function files(): FilesInterface;
}
