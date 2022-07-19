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

use FilesystemIterator;
use RecursiveIteratorIterator;
use RecursiveDirectoryIterator;
use Reiterus\AppStatsBundle\Contract\HelperInterface;

/**
 * Class Helper
 *
 * @package Reiterus\AppStatsBundle\Service
 * @author Pavel Vasin <reiterus@yandex.ru>
 */
class Helper implements HelperInterface
{
    /**
     * Count files in a directory
     *
     * @param string $folder
     *
     * @return int
     */
    public function fileCount(string $folder): int
    {
        $result = 0;

        if (file_exists($folder)) {
            $items = $this->iterator($folder);

            foreach ($items as $item) {
                if (!$item->isDir()) {
                    $result++;
                }
            }
        }

        return $result;
    }

    /**
     * Folder size in bytes
     *
     * @param string $folder
     *
     * @return int
     */
    public function folderSize(string $folder): int
    {
        $bytes = 0;

        if (file_exists($folder)) {
            $items = $this->iterator($folder);

            foreach ($items as $item) {
                if (!$item->isDir()) {
                    $bytes += $item->getSize();
                }
            }
        }

        return $bytes;
    }

    /**
     * Recursive Folder Iterator
     *
     * @param string $folder
     *
     * @return RecursiveIteratorIterator
     */
    public function iterator(string $folder): RecursiveIteratorIterator
    {
        return new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator(
                $folder,
                FilesystemIterator::SKIP_DOTS
            )
        );
    }
}