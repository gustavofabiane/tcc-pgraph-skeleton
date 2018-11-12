<?php

if (PHP_SAPI == 'cli-server') {
    // To help the built-in PHP dev server, check if the request was actually for
    // something which should probably be served as a static file
    $url  = parse_url($_SERVER['REQUEST_URI']);
    $file = __DIR__ . $url['path'];
    if (is_file($file)) {
        return false;
    }
}

/**
 * @var \Framework\Core\Application $app
 */
$app = require '../bootstrap.php';

/**
 * Runs application for incomming request and produces an HTTP response.
 */
$app->run(
    Framework\Http\requestFromServerParams()
);