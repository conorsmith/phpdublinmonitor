<?php
declare(strict_types=1);

namespace ConorSmith\PhpDublinMonitor\Console;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class LogWebsiteStatusCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName("log:status")
            ->setDescription("Logs the current status of the PHPDublin website");
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln("placeholder text");
    }
}
