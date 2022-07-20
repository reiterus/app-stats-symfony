<?php

/*
 * This file is part of the Reiterus package.
 *
 * (c) Pavel Vasin <reiterus@yandex.ru>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Reiterus\AppStatsBundle\Service;

use Symfony\Component\HttpKernel\KernelInterface;
use Reiterus\AppStatsBundle\Contract\FactoryInterface;
use Reiterus\AppStatsBundle\Contract\HelperInterface;

/**
 * Class Factory
 *
 * @package Reiterus\AppStatsBundle\Service
 * @author Pavel Vasin <reiterus@yandex.ru>
 */
class Factory implements FactoryInterface
{
    private KernelInterface $kernel;
    private HelperInterface $helper;

    /**
     * @codeCoverageIgnore
     * @param KernelInterface $kernel
     * @param HelperInterface $helper
     */
    public function __construct(
        KernelInterface $kernel,
        HelperInterface $helper
    )
    {
        $this->kernel = $kernel;
        $this->helper = $helper;
    }

    /**
     * Get KernelInterface instance
     *
     * @return KernelInterface
     */
    public function kernel(): KernelInterface
    {
        return $this->kernel;
    }

    /**
     * Get HelperInterface instance
     *
     * @return HelperInterface
     */
    public function helper(): HelperInterface
    {
        return $this->helper;
    }
}