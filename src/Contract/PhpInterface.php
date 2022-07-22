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
 * Interface PhpInterface
 *
 * @package Reiterus\AppStatsBundle\Contract
 * @author Pavel Vasin <reiterus@yandex.ru>
 */
interface PhpInterface
{
    /**
     * Get php files list
     *
     * @param array $folders
     *
     * @return array
     */
    public function getList(array $folders = ['src']): array;

    /**
     * What are we looking for
     *
     * @return array
     */
    public function required(): array;

    /**
     * Count occurrences
     *
     * @param array $paths
     *
     * @return array
     */
    public function counter(array $paths): array;
}
