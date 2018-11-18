<?php

namespace App\Http\Handlers;

use Psr\Http\Server\RequestHandlerInterface;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

use function Pgraph\Http\response;

/**
 * HelloLiliHandler
 * 
 * HTTP Handler implementation.
 */
class HelloLiliHandler implements RequestHandlerInterface
{
    /**
     * Create a new HelloLiliHandler instance.
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
        
        return response();
    }
}
