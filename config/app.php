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
    // 'routes_cache_file'              => __DIR__ . '/../cache/routes.cache.php',
    'define_route_before_middleware' => false,

    /**
     * Database Settings
     */
    'database' => [
        'dsn'      => 'mysql:host=127.0.0.1;dbname=blog_tcc', 
        'user'     => 'root', 
        'password' => ''
    ],

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

        /**
         * Default application provider.
         */
        '\App\Providers\ApplicationProvider',

        /**
         * Console commands provider.
         */
        '\App\Providers\CommandProvider',
        
        /**
         * Router component provider.
         */
        '\App\Providers\RouterProvider',

        /**
         * GraphQL component provider.
         */
        '\App\Providers\GraphQLProvider',

        /**
         * Application providers
         */
        // '\App\Providers\MyServiceProvider',
    ]
];
