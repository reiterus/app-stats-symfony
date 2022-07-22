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

/**
 * Class Php
 *
 * @package Reiterus\AppStatsBundle\Service
 * @author Pavel Vasin <reiterus@yandex.ru>
 */
class Php extends AbstractService implements PhpInterface
{
    /**
     * Get php files list
     *
     * @param array $folders
     *
     * @return array
     */
    public function getList(array $folders = ['src', 'tests']): array
    {
        $result = [];
        $root = $this->getProjectDir();

        foreach ($folders as $folder) {
            $path = sprintf('%s/%s', $root, $folder);
            $iterator = $this->getDirIterator($path);

            foreach ($iterator as $file) {
                $extension = $file->getExtension();
                $isKernel = $file->getFilename() != 'Kernel.php';

                if ($extension == 'php' && $isKernel) {
                    $result[] = $file->getPathname();
                }
            }
        }

        return $result;
    }

    /**
     * What are we looking for
     *
     * @return array
     */
    public function required(): array
    {
        $keys = [
            'class ',
            'abstract class',
            'interface ',
            'trait ',
            'public function',
            'protected function',
            'private function',
            'public static function',
            'protected static function',
            'private static function',
        ];

        return array_fill_keys($keys, 0);
    }

    /**
     * Count occurrences
     *
     * @param array $paths
     *
     * @return array
     */
    public function counter(array $paths): array
    {
        $result = $this->required();

        foreach ($paths as $path) {
            $text = file_get_contents($path);

            foreach ($result as $needle => $amount) {
                $result[$needle] += substr_count($text, $needle);
            }
        }

        return $result;
    }
}