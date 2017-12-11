<?php
declare(strict_types=1);

namespace ConorSmith\PhpDublinMonitor\Web;

use League\Route\RouteCollection;
use Zend\Diactoros\Response;
use Zend\Diactoros\Response\EmitterInterface;
use Zend\Diactoros\ServerRequestFactory;

class Kernel
{
    /** @var RouteCollection */
    private $routes;

    /** @var EmitterInterface */
    private $emitter;

    public function __construct(RouteCollection $routes, EmitterInterface $emitter)
    {
        $this->routes = $routes;
        $this->emitter = $emitter;
    }

    public function handle(): void
    {
        $response = $this->routes->dispatch(ServerRequestFactory::fromGlobals(), new Response);

        $this->emitter->emit($response);
    }
}
