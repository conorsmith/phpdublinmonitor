<?php
declare(strict_types=1);

namespace ConorSmith\PhpDublinMonitor;

use Doctrine\DBAL\Connection;
use Icecave\Chrono\Clock\ClockInterface;

class LogWebsiteStatus
{
    /** @var Connection */
    private $db;

    /** @var ClockInterface */
    private $clock;

    public function __construct(Connection $db, ClockInterface $clock)
    {
        $this->db = $db;
        $this->clock = $clock;
    }

    public function __invoke(): void
    {
        $this->db->insert("website_status", [
            'online'    => true,
            'logged_at' => $this->clock->utcDateTime()->format("Y-m-d H:i:s"),
        ]);
    }
}
