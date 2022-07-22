<?php

namespace Reiterus\AppStatsBundle\Contract;

use RecursiveIteratorIterator;

/**
 * Interface IteratorInterface
 * @package Reiterus\AppStatsBundle\Contract
 */
interface IteratorInterface
{
    /**
     * Get Recursive Directory Iterator
     *
     * @param string $directory
     * @param int $flags
     *
     * @return RecursiveIteratorIterator
     */
    public function getDirIterator(string $directory, int $flags = 4096): RecursiveIteratorIterator;
}
