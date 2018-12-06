<?php

namespace App\Http\Handlers;

use Psr\Http\Server\RequestHandlerInterface;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

use function Pgraph\Http\response;

/**
 * HelloWorldHandler
 * 
 * HTTP Handler implementation.
 */
class HelloWorldHandler implements RequestHandlerInterface
{
    protected $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * Handle an incomming HTTP request.
     * 
     * @param Request $request
     * @return Response
     */
    public function handle(Request $request): Response
    {
        $this->logger->info('Said hello.');
        return response('Hello World!');
    }
}
