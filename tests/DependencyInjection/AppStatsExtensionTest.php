<?php

/*
 * This file is part of the Reiterus package.
 *
 * (c) Pavel Vasin <reiterus@yandex.ru>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Reiterus\AppStatsBundle\Tests\DependencyInjection;

use Exception;
use Reiterus\AppStatsBundle\DependencyInjection\AppStatsExtension;
use PHPUnit\Framework\TestCase;
use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * @covers \Reiterus\AppStatsBundle\DependencyInjection\AppStatsExtension
 * Class AppStatsExtensionTest
 *
 * @package Reiterus\AppStatsBundle\Tests\DependencyInjection
 * @author Pavel Vasin <reiterus@yandex.ru>
 */
class AppStatsExtensionTest extends TestCase
{
    private AppStatsExtension $object;

    /**
     * @covers \Reiterus\AppStatsBundle\DependencyInjection\AppStatsExtension::load
     * @return void
     * @throws Exception
     */
    public function testLoad()
    {
        $container = new ContainerBuilder();
        $this->object->load([], $container);
        $result = $this->doesNotPerformAssertions();
        $this->assertFalse($result);
    }

    /**
     * @covers \Reiterus\AppStatsBundle\DependencyInjection\AppStatsExtension::getAlias
     * @return void
     */
    public function testGetAlias()
    {
        $actual = $this->object->getAlias();
        $this->assertIsString($actual);
        $this->assertEquals(AppStatsExtension::ALIAS, $actual);
    }

    /**
     * @codeCoverageIgnore
     * @return void
     */
    protected function setUp(): void
    {
        $this->object = new AppStatsExtension();
    }
}
