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

/**
 * @codeCoverageIgnore
 * Interface FilesInterface
 *
 * @package Reiterus\AppStatsBundle\Contract
 * @author Pavel Vasin <reiterus@yandex.ru>
 */
interface FilesInterface
{
    /**
     * Count files by extensions
     *
     * @param string $root
     * @param array $folders
     *
     * @return array
     */
    public function countByExtensions(string $root, array $folders): array;
}
