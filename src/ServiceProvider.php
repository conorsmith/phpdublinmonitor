<?php
declare(strict_types=1);

namespace ConorSmith\PhpDublinMonitor;

use Doctrine\DBAL\DriverManager;
use Icecave\Chrono\Clock\SystemClock;
use Illuminate\Contracts\Container\Container;

class ServiceProvider
{
    public function register(Container $container): void
    {
        $container[LogWebsiteStatus::class] = function ($container) {
            return new LogWebsiteStatus(
                DriverManager::getConnection([
                    'driver'   => "pdo_mysql",
                    'host'     => getenv('DB_HOST'),
                    'dbname'   => getenv('DB_NAME'),
                    'user'     => getenv('DB_USER'),
                    'password' => getenv('DB_PASS'),
                ]),
                new SystemClock
            );
        };
    }
}
