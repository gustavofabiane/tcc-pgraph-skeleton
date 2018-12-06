<?php

/**
 * Configuration of the core application environment.
 */
return [

    /**
     * Application settings.
     */
    'enviroment' => 'development',
    'debug'      => true,

    /**
     * Routing settings.
     * 
     * -> route_cache_file: define where to cache defined routes
     * 
     * -> define_route_before_middleware: if the application should match 
     *      the request route before the middleware stack execution
     */
    'routes_cache_file'              => null,
    'define_route_before_middleware' => false,

    /**
     * Application middleware stack.
     */
    'middleware' => [
        //
    ],

    /**
     * Application providers.
     */
    'providers' => [
        '\App\Providers\ApplicationProvider',
        '\App\Providers\CommandProvider',
        '\App\Providers\RouterProvider',
        '\App\Providers\GraphQLProvider',
    ]
];


