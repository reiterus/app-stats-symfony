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
use Reiterus\AppStatsBundle\Contract\HelperInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Console\Helper\Table;

/**
 * General application statistics
 *
 * @package Reiterus\AppStatsBundle\Command
 * @author Pavel Vasin <reiterus@yandex.ru>
 */
class GeneralCommand extends Command
{
    const ABOUT = 'General Application Statistics';

    private FactoryInterface $factory;
    protected static $defaultName = 'rts:stats:general';
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

        $helper = $this->factory->helper();
        $root = $helper->getProjectDir();

        list($bytesWork, $counter, $rows) = $this->tableData($helper, 4, $root);

        $bytesAll = sprintf(
            '%s (vendor, var, etc)',
            $helper->counter($root, true)
        );

        $table = new Table($output);
        $table
            ->setHeaders(['#', 'Title', 'Value'])
            ->setRows([
                [1, 'Root folder', $root],
                [2, 'All project in bytes', $bytesAll],
                [3, 'Working files in bytes', $bytesWork],
                [4, 'Number of working files', $counter],
            ]);
        $table->addRows($rows);
        $table->render();

        return Command::SUCCESS;
    }

    /**
     * Data for general table report
     *
     * @param int $number
     * @param string $rootFolder
     *
     * @return array
     */

    /**
     * Get data for general table report
     *
     * @param HelperInterface $helper
     * @param int $number
     * @param string $root
     *
     * @return array
     */
    private function tableData(
        HelperInterface $helper,
        int $number,
        string $root
    ): array
    {
        $files = 0;
        $bytes = 0;
        $rows = [];

        foreach ($helper->folderNames() as $folder) {
            $number++;
            $path = sprintf('%s/%s', $root, $folder);
            $count = $helper->counter($path);
            $size = $helper->counter($path, true);

            $rows[] = [
                $number,
                sprintf('...including "%s"', $folder),
                $count
            ];

            $files += $count;
            $bytes += $size;
        }

        return [$bytes, $files, $rows];
    }
}
