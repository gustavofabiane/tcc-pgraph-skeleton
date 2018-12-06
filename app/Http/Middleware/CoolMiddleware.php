<?php

namespace App\Http\Middleware;

use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface as Handler;

/**
 * CoolMiddleware
 *
 * A middleware implementation to append in response body
 * that 'P.graph is cool'.
 */
class CoolMiddleware implements MiddlewareInterface
{
    /**
     * Append 'P.graph is cool' at the end of response body.
     *
     * @param Request $request
     * @param Handler $handler
     * @return Response
     */
    public function process(Request $request, Handler $handler): Response
    {
        $response = $handler->handle($request);
        $response->getParsedBody()->write(' - P.graph is cool!!!');

        return $response;
    }
}
