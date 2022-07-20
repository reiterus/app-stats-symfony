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
     * @codeCoverageIgnore
     * Data for general table report
     *
     * @param int $number
     * @param string $rootFolder
     *
     * @return array
     */
    public function tableGeneral(int $number, string $rootFolder): array
    {
        $files = 0;
        $bytes = 0;
        $rows = [];

        foreach ($this->folderNames() as $folder) {
            $number++;
            $path = sprintf('%s/%s', $rootFolder, $folder);
            $count = $this->fileCount($path);
            $size = $this->folderSize($path);

            $rows[] = [
                $number,
                sprintf('...including "%s"', $folder),
                $count
            ];

            $files += $count;
            $bytes += $size;
        }

        return [$bytes, $files, $rows];
    }

    /**
     * Names of the required directories
     *
     * @return array
     */
    public function folderNames(): array
    {
        return [
            'assets',
            'bin',
            'config',
            'migrations',
            'public',
            'templates',
            'translations',
            'src',
            'tests',
        ];
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