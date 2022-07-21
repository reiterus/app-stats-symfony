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

use Exception;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

/**
 * Summary application statistics
 *
 * @package Reiterus\AppStatsBundle\Command
 * @author Pavel Vasin <reiterus@yandex.ru>
 */
class SummaryCommand extends Command
{
    const ABOUT = 'Summary Application Statistics';

    protected static $defaultName = 'rts:stats:summary';
    protected static $defaultDescription = self::ABOUT;

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
        $result = Command::SUCCESS;

        $commands = [
            'rts:stats:general',
            'rts:stats:files',
            'rts:stats:php',
        ];

        foreach ($commands as $rts) {
            $command = $this->getApplication()->find($rts);

            try {
                $command->run($input, $output);
            } catch (Exception $exception) {
                $io = new SymfonyStyle($input, $output);
                $io->error($exception->getMessage());
                $result = Command::FAILURE;
            }
        }

        return $result;
    }
}
