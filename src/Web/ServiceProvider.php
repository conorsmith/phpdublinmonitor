<?php
declare(strict_types=1);

namespace ConorSmith\PhpDublinMonitor\Web;

use Doctrine\DBAL\Connection;
use Illuminate\Contracts\Container\Container;
use League\Plates\Engine;
use League\Route\RouteCollection;

class ServiceProvider
{
    public function register(Container $container): void
    {
        $container[DisplayWebsiteStatusAction::class] = function ($container) {
            return new DisplayWebsiteStatusAction(
                $container[Connection::class],
                new Engine(__DIR__ . "/../../resources/templates")
            );
        };

        $container[RouteCollection::class] = function ($container) {
            $routes = new RouteCollection;

            $routes->map('GET', "/", $container[DisplayWebsiteStatusAction::class]);

            return $routes;
        };
    }
}
