<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

use function Framework\Http\response;

/*
| Collect the application routes.
| 
| Current scope runs in router component 'collect' and 
| '$this' references the application route collector instance.
|
*/
/** 
 * @var \Framework\Router\RouteCollectorInterface $this
 */

$this->get('/hello/{name}', function (string $name): Response {
    return response(200, 'Hello, ' . $name . '!');
});

$this->get('/hello-handler/{name}', 'App\Http\Handlers\HelloHandler');
