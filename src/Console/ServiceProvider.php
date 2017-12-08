<?php
declare(strict_types=1);

namespace ConorSmith\PhpDublinMonitor\Console;

use Illuminate\Contracts\Container\Container;
use Symfony\Component\Console\Application as SymfonyConsole;

class ServiceProvider
{
    public function register(Container $container): void
    {
        $container[Kernel::class] = function ($container) {
            $symfonyKernel = new SymfonyConsole;

            $symfonyKernel->add($container[LogWebsiteStatusAction::class]);

            return new Kernel($symfonyKernel);
        };
    }
}
