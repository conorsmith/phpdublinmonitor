<?php
declare(strict_types=1);

namespace ConorSmith\PhpDublinMonitor;

use ConorSmith\PhpDublinMonitor\Console\Kernel;
use ConorSmith\PhpDublinMonitor\Console\LogWebsiteStatusCommand;
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

            $symfonyKernel->add(new LogWebsiteStatusCommand);

            return new Kernel($symfonyKernel);
        };
    }

    public function make(string $className)
    {
        return $this->container->make($className);
    }
}
