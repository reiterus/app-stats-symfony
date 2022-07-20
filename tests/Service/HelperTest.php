<?php

/*
 * This file is part of the Reiterus package.
 *
 * (c) Pavel Vasin <reiterus@yandex.ru>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Reiterus\AppStatsBundle\Tests\Service;

use RecursiveIteratorIterator;
use Reiterus\AppStatsBundle\Service\Helper;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Reiterus\AppStatsBundle\Service\Helper
 * Class HelperTest
 *
 * @package Reiterus\AppStatsBundle\Tests\Service
 * @author Pavel Vasin <reiterus@yandex.ru>
 */
class HelperTest extends TestCase
{
    private Helper $object;
    /**
     * @covers \Reiterus\AppStatsBundle\Service\Helper::fileCount
     * @return void
     */
    public function testFileCount(): void
    {
        $actual = $this->object->fileCount(__DIR__);
        $this->assertIsInt($actual);
    }

    /**
     * @covers \Reiterus\AppStatsBundle\Service\Helper::folderSize
     * @return void
     */
    public function testFolderSize(): void
    {
        $actual = $this->object->folderSize(__DIR__);
        $this->assertIsInt($actual);
    }

    /**
     * @covers \Reiterus\AppStatsBundle\Service\Helper::iterator
     * @return void
     */
    public function testIterator(): void
    {
        $actual = $this->object->iterator(__DIR__);
        $this->assertInstanceOf(RecursiveIteratorIterator::class, $actual);
    }

    /**
     * @codeCoverageIgnore
     * @return void
     */
    protected function setUp(): void
    {
        $this->object = new Helper();
    }
}
