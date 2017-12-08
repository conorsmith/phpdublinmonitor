<?php
declare(strict_types=1);

namespace ConorSmith\PhpDublinMonitor\Web;

use Doctrine\DBAL\Connection;
use Illuminate\Contracts\Container\Container;

class ServiceProvider
{
    public function register(Container $container): void
    {
        $container[DisplayWebsiteStatusAction::class] = function ($container) {
            return new DisplayWebsiteStatusAction(
                $container[Connection::class]
            );
        };
    }
}
