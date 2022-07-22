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
     * Names of the required directories
     *
     * @return array
     */
    public function folderNames(): array;

    /**
     * Count size or quantity
     *
     * @param string $folder
     * @param bool $size
     *
     * @return int
     */
    public function counter(string $folder, bool $size = false): int;
}
