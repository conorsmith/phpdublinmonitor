<?php
declare(strict_types=1);

namespace ConorSmith\PhpDublinMonitor\Console;

use ConorSmith\PhpDublinMonitor\LogWebsiteStatus;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class LogWebsiteStatusCommand extends Command
{
    /** @var LogWebsiteStatus */
    private $logWebsiteStatus;

    public function __construct(LogWebsiteStatus $logWebsiteStatus)
    {
        $this->logWebsiteStatus = $logWebsiteStatus;
        parent::__construct();
    }

    protected function configure()
    {
        $this
            ->setName("log:status")
            ->setDescription("Logs the current status of the PHPDublin website");
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->logWebsiteStatus->__invoke();
        $output->writeln("Dummy data inserted");
    }
}
