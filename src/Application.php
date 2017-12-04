<?php
declare(strict_types=1);

namespace ConorSmith\PhpDublinMonitor;

use Dotenv\Dotenv;
use Illuminate\Contracts\Container\Container;

class Application
{
    /** @var Container */
    private $container;

    public function __construct(Container $container)
    {
        $this->container = $container;
        $this->boot();
    }

    private function boot(): void
    {
        (new Dotenv(__DIR__ . "/../"))->load();
        $this->registerServiceProviders();
    }

    private function registerServiceProviders(): void
    {
        (new Console\ServiceProvider)->register($this->container);
        (new ServiceProvider)->register($this->container);
    }

    public function make(string $className)
    {
        return $this->container->make($className);
    }
}
