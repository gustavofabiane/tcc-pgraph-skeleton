<?php

/**
 * GraphQL component configuration.
 */
return [

    /**
     * GraphQL API debug level.
     * 
     * @see http://webonyx.github.io/graphql-php/error-handling/#debugging-tools
     * @var int
     */
    'debug' => Debug::INCLUDE_DEBUG_MESSAGE | Debug::INCLUDE_TRACE,

    /**
     * JSON encoding option for json_encode function.
     * 
     * @var int
     */
    'json_encoding_option' => JSON_PRETTY_PRINT,

    /**
     * Response message in case of API non-safe internal error.
     * 
     * @see setInternalErrorMessage on http://webonyx.github.io/graphql-php/reference/#graphqlerrorformattederror
     * @var string
     */
    'internal_error_message' => 'Unexpected Error', 

    /**
     * Define whether the API allows query batching.
     * 
     * @see http://webonyx.github.io/graphql-php/executing-queries/#query-batching
     * @var bool
     */
    'allow_query_batching' => true,

    /**
     * The GraphQL root resolving value.
     * 
     * @see http://webonyx.github.io/graphql-php/executing-queries/#server-configuration-options
     * @var callable|null
     */
    'root_value' => null,

    /**
     * The GraphQL schema query type fields and its resolving types,
     * assumes that the array key is the field name and the value 
     * is the resolving type. 
     */
    'query' => [

    ],
    
    /**
     * The GraphQL schema mutation type fields and its resolving types,
     * assumes the same behavior of the schema query.
     */
    'mutation' => [

    ], 
    
    /**
     * The GraphQL schema declared types.
     */
    'types' => [],

    /**
     * Custom schema directives.
     * 
     * @see http://webonyx.github.io/graphql-php/type-system/directives/#custom-directives
     * @var array
     */
    'directives' => [],

    /**
     * The schema error formatter and handler callables.
     * 
     * @see http://webonyx.github.io/graphql-php/error-handling/#custom-error-handling-and-formatting
     * @var callable
     */ 
    'error_formatter' => '\Framework\GraphQL\Error\BasicErrorHandler::formatError',
    'errors_handler'  => '\Framework\GraphQL\Error\BasicErrorHandler::handleErrors',

    /**
     * The GraphQL API security specifications. 
     * 
     * @see http://webonyx.github.io/graphql-php/security/
     * @var array
     */
    'security' => [
        
        'max_complexity' => null,
        'max_depth' => null,
        'disable_introspection' => false,

        /**
         * The GraphQL API custom security rules for query execution.
         * 
         * @see http://webonyx.github.io/graphql-php/executing-queries/#custom-validation-rules
         * @var array
         */
        'rules' => [

        ]
    ],

    /**
     * The GraphQL API HTTP server configurations.
     * 
     * @var array
     */
    'http' => [
        'endpoint' => '/graphql',
        'route_name' => 'graphql',
        'methods'  => ['GET', 'POST'],
        'headers'  => [],
        'middleware' => [],
    ]
];