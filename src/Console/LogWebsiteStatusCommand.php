<?php
declare(strict_types=1);

namespace ConorSmith\PhpDublinMonitor\Console;

use Doctrine\DBAL\Connection;
use Icecave\Chrono\Clock\ClockInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class LogWebsiteStatusCommand extends Command
{
    /** @var Connection */
    private $db;

    /** @var ClockInterface */
    private $clock;

    public function __construct(Connection $db, ClockInterface $clock)
    {
        $this->db = $db;
        $this->clock = $clock;
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
        $this->db->insert("website_status", [
            'online'    => true,
            'logged_at' => $this->clock->utcDateTime()->format("Y-m-d H:i:s"),
        ]);

        $output->writeln("Dummy data inserted");
    }
}
