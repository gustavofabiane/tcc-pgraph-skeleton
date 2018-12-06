<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

use function Pgraph\Http\response;

/*
| Collect the application routes.
| 
| Current scope runs in router component 'collect' and '$this' 
| references the application route collector instance.
*/
/** 
 * @var \Framework\Router\RouteCollectorInterface $this
 */

$this->get('/hello-world', '\App\Http\Handlers\HelloWorldHandler')
     ->add('\App\Http\Middleware\CoolMiddleware');


