<?php

namespace App\Http\Handlers;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

use function Framework\Http\response;

class HelloHandler implements RequestHandlerInterface
{
    protected $router;

    public function __construct(\Framework\Router\RouterInterface $router)
    {
        $this->router = $router;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        return response(200, 'Hello with handler, ' . $request->getAttribute('name') . '! <pre>' . print_r($this->router, true));
    }
}
