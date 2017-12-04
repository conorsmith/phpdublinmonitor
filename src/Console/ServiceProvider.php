<?php
declare(strict_types=1);

namespace ConorSmith\PhpDublinMonitor\Console;

use Doctrine\DBAL\DriverManager;
use Icecave\Chrono\Clock\SystemClock;
use Illuminate\Contracts\Container\Container;
use Symfony\Component\Console\Application as SymfonyConsole;

class ServiceProvider
{
    public function register(Container $container): void
    {
        $container[Kernel::class] = function ($container) {
            $symfonyKernel = new SymfonyConsole;

            $symfonyKernel->add($container[LogWebsiteStatusCommand::class]);

            return new Kernel($symfonyKernel);
        };

        $container[LogWebsiteStatusCommand::class] = function ($container) {
            return new LogWebsiteStatusCommand(
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
