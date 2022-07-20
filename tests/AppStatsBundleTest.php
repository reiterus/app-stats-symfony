<?php

/*
 * This file is part of the Reiterus package.
 *
 * (c) Pavel Vasin <reiterus@yandex.ru>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Reiterus\AppStatsBundle\Tests;

use Reiterus\AppStatsBundle\AppStatsBundle;
use PHPUnit\Framework\TestCase;
use Reiterus\AppStatsBundle\DependencyInjection\AppStatsExtension;

/**
 * @covers \Reiterus\AppStatsBundle\AppStatsBundle
 * Class AppStatsBundleTest
 */
class AppStatsBundleTest extends TestCase
{
    /**
     * @covers \Reiterus\AppStatsBundle\AppStatsBundle::getContainerExtension
     * @return void
     */
    public function testGetContainerExtension()
    {
        $bundle = new AppStatsBundle();
        $actual = $bundle->getContainerExtension();
        $this->assertInstanceOf(AppStatsExtension::class, $actual);
    }
}
