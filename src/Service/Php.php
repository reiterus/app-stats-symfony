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
use Reiterus\AppStatsBundle\Contract\PhpInterface;

/**
 * Class Php
 *
 * @package Reiterus\AppStatsBundle\Service
 * @author Pavel Vasin <reiterus@yandex.ru>
 */
class Php implements PhpInterface
{
    /**
     * Get php files list
     *
     * @param string $root
     * @param array $folders
     *
     * @return array
     */
    public function getList(string $root, array $folders = ['src', 'tests']): array
    {
        $result = [];

        foreach ($folders as $folder) {
            $path = sprintf('%s/%s', $root, $folder);

            $it = new RecursiveDirectoryIterator($path);
            $iterator = new RecursiveIteratorIterator($it);

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