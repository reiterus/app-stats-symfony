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

use Reiterus\AppStatsBundle\Contract\FilesInterface;

/**
 * Class Files
 *
 * @package Reiterus\AppStatsBundle\Service
 * @author Pavel Vasin <reiterus@yandex.ru>
 */
class Files extends AbstractService implements FilesInterface
{
    /**
     * Count files by extensions
     *
     * @param array $folders
     *
     * @return array
     */
    public function countByExtensions(array $folders): array
    {
        $result = [];
        $root = $this->getProjectDir();
        
        foreach ($folders as $folder) {
            $path = sprintf('%s/%s', $root, $folder);
            $iterator = $this->getDirIterator($path);
            
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