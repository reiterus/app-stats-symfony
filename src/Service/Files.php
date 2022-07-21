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
use Reiterus\AppStatsBundle\Contract\FilesInterface;

/**
 * Class Files
 *
 * @package Reiterus\AppStatsBundle\Service
 * @author Pavel Vasin <reiterus@yandex.ru>
 */
class Files implements FilesInterface
{
    /**
     * Count files by extensions
     *
     * @param string $root
     * @param array $folders
     *
     * @return array
     */
    public function countByExtensions(string $root, array $folders): array
    {
        $result = [];
        
        foreach ($folders as $folder) {
            $path = $root . '/' . $folder;
            
            $it = new RecursiveDirectoryIterator($path);
            $iterator = new RecursiveIteratorIterator($it);
            
            foreach ($iterator as $file) {
                $extension = $file->getExtension();

                if ($extension == '') {
                    continue;
                }

                if (!isset($result[$extension])) {
                    $result[$extension] = 0;
                }

                $result[$extension] += 1;
            }
        }

        arsort($result);

        return $result;
    }
}