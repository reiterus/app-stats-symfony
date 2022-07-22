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

use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use Reiterus\AppStatsBundle\Contract\AbstractServiceInterface;
use Reiterus\AppStatsBundle\Contract\IteratorInterface;
use Symfony\Component\HttpKernel\KernelInterface;

/**
 * @codeCoverageIgnore
 * Class AbstractService
 *
 * @package Reiterus\AppStatsBundle\Service
 * @author Pavel Vasin <reiterus@yandex.ru>
 */
abstract class AbstractService implements AbstractServiceInterface, IteratorInterface
{
    /**
     * @var KernelInterface
     */
    private KernelInterface $kernel;

    /**
     * @param KernelInterface $kernel
     */
    public function __construct(
        KernelInterface $kernel
    ) {
        $this->kernel = $kernel;
    }

    /**
     * Get Kernel instance
     *
     * @return KernelInterface
     */
    public function getKernel(): KernelInterface
    {
        return $this->kernel;
    }

    /**
     * Get path to root project folder
     *
     * @return string
     */
    public function getProjectDir(): string
    {
        return $this->kernel->getProjectDir();
    }

    /**
     * Get Recursive Iterator
     *
     * @param string $directory
     * @param int $flags
     *
     * @return RecursiveIteratorIterator
     */
    public function getDirIterator(string $directory, int $flags = 4096): RecursiveIteratorIterator
    {
        $directoryIterator = new RecursiveDirectoryIterator($directory, $flags);
        return new RecursiveIteratorIterator($directoryIterator);
    }
}
