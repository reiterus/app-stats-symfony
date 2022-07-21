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

use Reiterus\AppStatsBundle\Service\Php;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Reiterus\AppStatsBundle\Service\Php
 * Class PhpTest
 *
 * @package Reiterus\AppStatsBundle\Service\Php
 * @author Pavel Vasin <reiterus@yandex.ru>
 */
class PhpTest extends TestCase
{
    private Php $object;

    /**
     * @covers \Reiterus\AppStatsBundle\Service\Php::getListetList
     * @return void
     */
    public function testGetList()
    {
        $root = dirname(__DIR__, 1);
        $actual = $this->object->getList($root, ['Service']);
        $this->assertIsArray($actual);
    }

    /**
     * @covers \Reiterus\AppStatsBundle\Service\Php::required
     * @return void
     */
    public function testRequired()
    {
        $actual = $this->object->required();
        $this->assertIsArray($actual);
    }

    /**
     * @covers \Reiterus\AppStatsBundle\Service\Php::counter
     * @return void
     */
    public function testCounter()
    {
        $root = dirname(__DIR__, 1);
        $list = $this->object->getList($root, ['DependencyInjection', 'Service']);
        $actual = $this->object->counter($list);
        $this->assertIsArray($actual);
    }

    /**
     * @codeCoverageIgnore
     * @return void
     */
    protected function setUp(): void
    {
        $this->object = new Php();
    }
}
