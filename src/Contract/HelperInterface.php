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

use RecursiveIteratorIterator;

/**
 * @codeCoverageIgnore
 * Interface HelperInterface
 *
 * @package Reiterus\AppStatsBundle\Contract
 * @author Pavel Vasin <reiterus@yandex.ru>
 */
interface HelperInterface
{
    /**
     * Count files in a directory
     *
     * @param string $folder
     *
     * @return int
     */
    public function fileCount(string $folder): int;

    /**
     * Folder size in bytes
     *
     * @param string $folder
     *
     * @return int
     */
    public function folderSize(string $folder): int;

    /**
     * Data for general table report
     *
     * @param int $number
     * @param string $rootFolder
     *
     * @return array
     */
    public function tableGeneral(int $number, string $rootFolder): array;

    /**
     * Names of the required directories
     *
     * @return array
     */
    public function folderNames(): array;

    /**
     * Recursive Folder Iterator
     *
     * @param string $folder
     *
     * @return RecursiveIteratorIterator
     */
    public function iterator(string $folder): RecursiveIteratorIterator;
}
