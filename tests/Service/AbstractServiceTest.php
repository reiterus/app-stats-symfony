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
use Reiterus\AppStatsBundle\Service\AbstractService;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpKernel\KernelInterface;

/**
 * @covers \Reiterus\AppStatsBundle\Service\AbstractService
 * Class AbstractServiceTest
 *
 * @package Reiterus\AppStatsBundle\Tests\Service
 * @author Pavel Vasin <reiterus@yandex.ru>
 */
class AbstractServiceTest extends TestCase
{
    private $object;

    /**
     * @covers \Reiterus\AppStatsBundle\Service\AbstractService::getProjectDir
     * @return void
     */
    public function testGetProjectDir(): void
    {
        $actual = $this->object->getProjectDir();
        $this->assertIsString($actual);
    }

    /**
     * @covers \Reiterus\AppStatsBundle\Service\AbstractService::getKernel
     * @return void
     */
    public function testGetKernel(): void
    {
        $actual = $this->object->getKernel();
        $this->assertInstanceOf(KernelInterface::class, $actual);
    }

    /**
     * @covers \Reiterus\AppStatsBundle\Service\AbstractService::getDirIterator
     * @return void
     */
    public function testGetDirIterator(): void
    {
        $actual = $this->object->getDirIterator(__DIR__);
        $this->assertInstanceOf(RecursiveIteratorIterator::class, $actual);
    }

    /**
     * @codeCoverageIgnore
     * @return void
     */
    protected function setUp(): void
    {
        $kernel = $this->getMockBuilder(KernelInterface::class)->getMock();
        $kernel->method('getProjectDir')->willReturn(dirname(__DIR__));

        $this->object = $this->getMockForAbstractClass(
            AbstractService::class,
            [
                'kernel' => $kernel
            ]
        );
    }
}
