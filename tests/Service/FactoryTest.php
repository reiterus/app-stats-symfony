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

use Reiterus\AppStatsBundle\Contract\FilesInterface;
use Reiterus\AppStatsBundle\Contract\PhpInterface;
use Symfony\Component\HttpKernel\KernelInterface;
use Reiterus\AppStatsBundle\Contract\HelperInterface;
use Reiterus\AppStatsBundle\Service\Factory;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Reiterus\AppStatsBundle\Service\Factory
 * Class FactoryTest
 *
 * @package Reiterus\AppStatsBundle\Tests\Service
 * @author Pavel Vasin <reiterus@yandex.ru>
 */
class FactoryTest extends TestCase
{
    private Factory $object;

    /**
     * @covers \Reiterus\AppStatsBundle\Service\Factory::kernel
     * @return void
     */
    public function testKernel(): void
    {
        $actual = $this->object->kernel();
        $this->assertInstanceOf(KernelInterface::class, $actual);
    }

    /**
     * @covers \Reiterus\AppStatsBundle\Service\Factory::helper
     * @return void
     */
    public function testHelper(): void
    {
        $actual = $this->object->helper();
        $this->assertInstanceOf(HelperInterface::class, $actual);
    }

    /**
     * @covers \Reiterus\AppStatsBundle\Service\Factory::files
     * @return void
     */
    public function testFiles(): void
    {
        $actual = $this->object->files();
        $this->assertInstanceOf(FilesInterface::class, $actual);
    }

    /**
     * @covers \Reiterus\AppStatsBundle\Service\Factory::php
     * @return void
     */
    public function testPhp(): void
    {
        $actual = $this->object->php();
        $this->assertInstanceOf(PhpInterface::class, $actual);
    }

    /**
     * @codeCoverageIgnore
     * @return void
     */
    protected function setUp(): void
    {
        $kernel = $this->getMockBuilder(KernelInterface::class)->getMock();
        $helper = $this->getMockBuilder(HelperInterface::class)->getMock();
        $files = $this->getMockBuilder(FilesInterface::class)->getMock();
        $php = $this->getMockBuilder(PhpInterface::class)->getMock();

        $this->object = new Factory($kernel, $helper, $files, $php);
    }
}
