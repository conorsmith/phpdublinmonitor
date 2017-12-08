<?php
declare(strict_types=1);

namespace ConorSmith\PhpDublinMonitor\Web;

use Doctrine\DBAL\DriverManager;
use Illuminate\Contracts\Container\Container;

class ServiceProvider
{
    public function register(Container $container): void
    {
        $container[DisplayWebsiteStatusAction::class] = function ($container) {
            return new DisplayWebsiteStatusAction(
                DriverManager::getConnection([
                    'driver'   => "pdo_mysql",
                    'host'     => getenv('DB_HOST'),
                    'dbname'   => getenv('DB_NAME'),
                    'user'     => getenv('DB_USER'),
                    'password' => getenv('DB_PASS'),
                ])
            );
        };
    }
}
