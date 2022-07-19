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
     * Recursive Folder Iterator
     *
     * @param string $folder
     *
     * @return RecursiveIteratorIterator
     */
    public function iterator(string $folder): RecursiveIteratorIterator;
}
