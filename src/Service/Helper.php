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

use Reiterus\AppStatsBundle\Contract\HelperInterface;

/**
 * Class Helper
 *
 * @package Reiterus\AppStatsBundle\Service
 * @author Pavel Vasin <reiterus@yandex.ru>
 */
class Helper extends AbstractService implements HelperInterface
{
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
     * Count size or quantity
     *
     * @param string $folder
     * @param bool $size
     *
     * @return int
     */
    public function counter(string $folder, bool $size = false): int
    {
        $result = 0;

        if (file_exists($folder)) {
            $items = $this->getDirIterator($folder);

            foreach ($items as $item) {
                if (!$item->isDir()) {
                    $result += $size ? $item->getSize() : 1;
                }
            }
        }

        return $result;
    }
}