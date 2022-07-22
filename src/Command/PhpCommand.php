<?php

/*
 * This file is part of the Reiterus package.
 *
 * (c) Pavel Vasin <reiterus@yandex.ru>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Reiterus\AppStatsBundle\Command;

use Reiterus\AppStatsBundle\Contract\FactoryInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Console\Helper\Table;

/**
 * Files application statistics
 *
 * @package Reiterus\AppStatsBundle\Command
 * @author Pavel Vasin <reiterus@yandex.ru>
 */
class PhpCommand extends Command
{
    const ABOUT = 'PHP Files Application Statistics';

    private FactoryInterface $factory;
    protected static $defaultName = 'rts:stats:php';
    protected static $defaultDescription = self::ABOUT;

    /**
     * @param FactoryInterface $factory
     */
    public function __construct(
        FactoryInterface $factory
    )
    {
        $this->factory = $factory;
        parent::__construct();
    }

    /**
     * Execute command
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     *
     * @return int
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $io->success(self::ABOUT);

        $php = $this->factory->php();
        $folders = ['src', 'tests'];

        $root = $php->getProjectDir();
        $list = $php->getList($folders);
        $rows = $php->counter($list);

        $index = 1;

        $table = new Table($output);
        $table
            ->setHeaders(['#', 'Title', 'Amount'])
            ->addRow([$index, 'Root folder', $root])
            ->addRow([++$index, 'Directory list', implode(', ', $folders)]);

        foreach ($rows as $needle => $amount) {
            ++$index;
            $needle = sprintf('... found "%s"', trim($needle));
            $table->addRow([$index, $needle, $amount]);
        }

        $table->render();

        return Command::SUCCESS;
    }
}
