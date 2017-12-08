<?php
declare(strict_types=1);

namespace ConorSmith\PhpDublinMonitor\Web;

use League\Route\RouteCollection;
use Zend\Diactoros\Response;
use Zend\Diactoros\ServerRequestFactory;

class Kernel
{
    /** @var RouteCollection */
    private $routes;

    public function __construct(RouteCollection $routes)
    {
        $this->routes = $routes;
    }

    public function handle(): void
    {
        $this->routes->dispatch(ServerRequestFactory::fromGlobals(), new Response);
    }
}
