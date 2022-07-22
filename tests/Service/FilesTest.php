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

use Reiterus\AppStatsBundle\Service\Files;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpKernel\KernelInterface;

/**
 * @covers \Reiterus\AppStatsBundle\Service\Files
 * Class FilesTest
 *
 * @package Reiterus\AppStatsBundle\Service\Files
 * @author Pavel Vasin <reiterus@yandex.ru>
 */
class FilesTest extends TestCase
{
    /**
     * @covers \Reiterus\AppStatsBundle\Service\Files::countByExtensions
     * @return void
     */
    public function testCountByExtensions()
    {
        $kernel = $this->getMockBuilder(KernelInterface::class)->getMock();
        $kernel->method('getProjectDir')->willReturn(dirname(__DIR__));
        $object = new Files($kernel);
        $actual = $object->countByExtensions(['Service']);
        $this->assertIsArray($actual);
        $this->assertIsInt(current($actual));
    }
}
