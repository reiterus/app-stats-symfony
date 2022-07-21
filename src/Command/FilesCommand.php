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
class FilesCommand extends Command
{
    const ABOUT = 'Files Application Statistics';

    private FactoryInterface $factory;
    protected static $defaultName = 'rts:stats:files';
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

        $kernel = $this->factory->kernel();
        $helper = $this->factory->helper();
        $files = $this->factory->files();

        $root = $kernel->getProjectDir();
        $rows = $files->countByExtensions($root, $helper->folderNames());
        $index = 1;

        $table = new Table($output);
        $table
            ->setHeaders(['#', 'Extension', 'Amount'])
            ->addRow([$index, 'Root folder', $root]);

        foreach ($rows as $extension => $amount) {
            $index++;
            $table->addRow([$index, $extension, $amount]);
        }

        $table->render();

        return Command::SUCCESS;
    }
}