<?php
declare(strict_types=1);

namespace ConorSmith\PhpDublinMonitor\Web;

use Doctrine\DBAL\Connection;
use Illuminate\Contracts\Container\Container;
use League\Plates\Engine;
use League\Route\RouteCollection;
use Psr\Http\Message\ResponseInterface;
use Slim\Middleware\HttpBasicAuthentication;
use Zend\Diactoros\Response\EmitterInterface;
use Zend\Diactoros\Response\SapiEmitter;

class ServiceProvider
{
    public function register(Container $container): void
    {
        $container[Engine::class] = function ($container) {
            return new Engine(__DIR__ . "/../../resources/templates");
        };

        $container[HttpBasicAuthentication::class] = function ($container) {
            return new HttpBasicAuthentication([
                'secure' => false,
                'users'  => [
                    getenv('ADMIN_USER') => getenv('ADMIN_PASS'),
                ],
            ]);
        };

        $container[RouteCollection::class] = function ($container) {
            $routes = new RouteCollection;

            $routes->map('GET', "/", $container[DisplayWebsiteStatusAction::class]);
            $routes->map('GET', "/historic", $container[DisplayHistoricStatusesAction::class])
                ->middleware($container[HttpBasicAuthentication::class]);

            return $routes;
        };

        $container->bind(EmitterInterface::class, SapiEmitter::class);
    }
}
