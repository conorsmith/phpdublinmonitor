<?php
declare(strict_types=1);

namespace ConorSmith\PhpDublinMonitor;

use Doctrine\DBAL\Connection;
use GuzzleHttp\ClientInterface as Guzzle;
use Icecave\Chrono\Clock\ClockInterface;
use Teapot\StatusCode;

class LogWebsiteStatus
{
    /** @var Guzzle */
    private $guzzle;

    /** @var Connection */
    private $db;

    /** @var ClockInterface */
    private $clock;

    public function __construct(Guzzle $guzzle, Connection $db, ClockInterface $clock)
    {
        $this->guzzle = $guzzle;
        $this->db = $db;
        $this->clock = $clock;
    }

    public function __invoke(): void
    {
        $response = $this->guzzle->request('GET', "https://phpdublin.com/");

        $this->db->insert("website_status", [
            'online'    => $response->getStatusCode() === StatusCode::OK,
            'logged_at' => $this->clock->utcDateTime()->format("Y-m-d H:i:s"),
        ]);
    }
}
