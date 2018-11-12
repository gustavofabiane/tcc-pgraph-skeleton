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
    'routes_cache_file'              => __DIR__ . '/../cache/routes.cache.php',
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

        /**
         * Default application provider.
         */
        '\App\Providers\ApplicationProvider',
        
        /**
         * Router component provider.
         */
        '\App\Providers\RouterProvider',

        /**
         * GraphQL compoenent provider.
         */
        '\App\Providers\GraphQLProvider' => [
            'typeRegistry', 
            'graphqlQuery', 
            'graphqlSchema', 
            'schemaFactory', 
            'graphqlServer', 
            'graphqlMutation', 
            'graphqlRequestHandler', 
            'graphqlDefaultFieldResolver'
        ]

        /**
         * Application providers
         */
        // '\App\Providers\MyServiceProvider',
    ]
];
