<?php
declare(strict_types=1);

namespace ConorSmith\PhpDublinMonitor\Web;

use Doctrine\DBAL\Connection;

class DisplayWebsiteStatusAction
{
    /** @var Connection */
    private $db;

    public function __construct(Connection $db)
    {
        $this->db = $db;
    }

    public function __invoke(): void
    {
        $row = $this->db->fetchAssoc("SELECT * FROM website_status ORDER BY logged_at DESC LIMIT 1");

        echo sprintf("The PHP Dublin website is <strong>%s</strong>", $row['online'] ? "online" : "offline");
    }
}
