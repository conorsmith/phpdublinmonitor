<?php
declare(strict_types=1);

namespace ConorSmith\PhpDublinMonitor;

use ConorSmith\PhpDublinMonitor\Console\Kernel;
use ConorSmith\PhpDublinMonitor\Console\LogWebsiteStatusCommand;
use Doctrine\DBAL\DriverManager;
use Illuminate\Contracts\Container\Container;
use Symfony\Component\Console\Application as SymfonyConsole;

class Application
{
    /** @var Container */
    private $container;

    public function __construct(Container $container)
    {
        $this->container = $container;
        $this->registerServices();
    }

    private function registerServices(): void
    {
        $this->container[Kernel::class] = function ($container) {
            $symfonyKernel = new SymfonyConsole;

            $symfonyKernel->add($container[LogWebsiteStatusCommand::class]);

            return new Kernel($symfonyKernel);
        };

        $this->container[LogWebsiteStatusCommand::class] = function ($container) {
            return new LogWebsiteStatusCommand(
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

    public function make(string $className)
    {
        return $this->container->make($className);
    }
}
