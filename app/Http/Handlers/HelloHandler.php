<?php

namespace App\Http\Handlers;

use Psr\Http\Server\RequestHandlerInterface;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

use function Pgraph\Http\response;

/**
 * HelloHandler
 * 
 * HTTP Handler implementation.
 */
class HelloHandler implements RequestHandlerInterface
{
    /**
     * Create a new HelloHandler instance.
     */
    public function __construct()
    {
        ///
    } 

    /**
     * Handle an incomming HTTP request.
     * 
     * @param Request $request
     * @return Response
     */
    public function handle(Request $request): Response
    {
        return response('Hello!');
    }
}
