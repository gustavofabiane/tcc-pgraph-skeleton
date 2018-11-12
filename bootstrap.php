<?php

require 'vendor/autoload.php';

/**
 * Resolves the application root directory.
 * 
 * @var string $baseDir
 */
$baseDir = realpath(__DIR__);

/**
 * Initializes the system configurations.
 * 
 * @var Framework\Core\Configuration $configuration
 */
$configuration = Framework\Core\Configuration::create([
    'prefix' => 'config',
    'folder' => $baseDir . '/config/'
]);

/**
 * Creates the application instance.
 * 
 * @var Framework\Core\Application $app
 */
$app = new Framework\Core\Application([], $configuration);

/**
 * Updates the application configuration with its default required values.
 */
$app['config']->update('app', [
    'app_home'   => $baseDir,
    'public_dir' => $baseDir . '/public',
    'routes_dir' => $baseDir . '/routing'
]);

/**
 * Register application providers.
 */
foreach ($app['config']->get('app', 'providers') as $key => $provider) {
    if (is_array($provider)) {
        $provided = $provider;
        $provider = $key;
    }
    $app->addProvider($provider, $provided ?? null);
}

/**
 * Register application middleware.
 */
$app->middleware($app['config']->get('app', 'middleware'));

/**
 * Return the application instance for further usage.
 */
return $app;
