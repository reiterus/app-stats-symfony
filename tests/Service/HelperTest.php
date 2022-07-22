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
use Symfony\Component\HttpKernel\KernelInterface;

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
     * @covers \Reiterus\AppStatsBundle\Service\Helper::counter
     * @dataProvider dataProvider
     * @param bool $size
     * @return void
     */
    public function testCounter(bool $size): void
    {
        $actual = $this->object->counter(__DIR__, $size);
        $this->assertIsInt($actual);
    }

    /**
     * @covers \Reiterus\AppStatsBundle\Service\Helper::folderNames
     * @return void
     */
    public function testFolderNames(): void
    {
        $actual = $this->object->folderNames();
        $this->assertIsArray($actual);
    }

    /**
     * @codeCoverageIgnore
     * @return array
     */
    public function dataProvider(): array
    {
        return [
            [true],
            [false],
        ];
    }

    /**
     * @codeCoverageIgnore
     * @return void
     */
    protected function setUp(): void
    {
        $kernel = $this->getMockBuilder(KernelInterface::class)->getMock();
        $kernel->method('getProjectDir')->willReturn(dirname(__DIR__));
        $this->object = new Helper($kernel);
    }
}
