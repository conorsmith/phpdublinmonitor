<?php
declare(strict_types=1);

namespace ConorSmith\PhpDublinMonitor\Console;

use Doctrine\DBAL\Connection;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class LogWebsiteStatusCommand extends Command
{
    /** @var Connection */
    private $db;

    public function __construct(Connection $db)
    {
        $this->db = $db;
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
            'online' => true,
        ]);

        $output->writeln("Dummy data inserted");
    }
}
