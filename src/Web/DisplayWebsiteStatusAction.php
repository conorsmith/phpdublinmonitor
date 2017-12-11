<?php
declare(strict_types=1);

namespace ConorSmith\PhpDublinMonitor\Web;

use DateTimeImmutable;
use Doctrine\DBAL\Connection;
use League\Plates\Engine;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\HtmlResponse;

class DisplayWebsiteStatusAction
{
    /** @var Connection */
    private $db;

    /** @var Engine */
    private $templateEngine;

    public function __construct(Connection $db, Engine $templateEngine)
    {
        $this->db = $db;
        $this->templateEngine = $templateEngine;
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        $row = $this->db->fetchAssoc("SELECT * FROM website_status ORDER BY logged_at DESC LIMIT 1");

        return new HtmlResponse(
            $this->templateEngine->render("home", [
                'status'      => $row['online'] ? "online" : "offline",
                'lastUpdated' => DateTimeImmutable::createFromFormat("Y-m-d H:i:s", $row['logged_at']),
            ])
        );
    }
}
