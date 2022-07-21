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

use Reiterus\AppStatsBundle\Contract\PhpInterface;
use Reiterus\AppStatsBundle\Contract\FilesInterface;
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
    private FilesInterface $files;
    private PhpInterface $php;

    /**
     * @codeCoverageIgnore
     * @param KernelInterface $kernel
     * @param HelperInterface $helper
     * @param FilesInterface $files
     * @param PhpInterface $php
     */
    public function __construct(
        KernelInterface $kernel,
        HelperInterface $helper,
        FilesInterface $files,
        PhpInterface $php
    )
    {
        $this->kernel = $kernel;
        $this->helper = $helper;
        $this->files = $files;
        $this->php = $php;
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

    /**
     * Get FilesInterface instance
     *
     * @return FilesInterface
     */
    public function files(): FilesInterface
    {
        return $this->files;
    }

    /**
     * Get PhpInterface instance
     *
     * @return PhpInterface
     */
    public function php(): PhpInterface
    {
        return $this->php;
    }
}
