<?php
declare(strict_types=1);

namespace ConorSmith\PhpDublinMonitor\Console;

use ConorSmith\PhpDublinMonitor\LogWebsiteStatus;
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
            return new LogWebsiteStatusCommand($container[LogWebsiteStatus::class]);
        };
    }
}
