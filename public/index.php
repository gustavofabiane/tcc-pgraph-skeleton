<?php

if (PHP_SAPI == 'cli-server') {
    // To help the built-in PHP dev server, check if the request was actually for
    // something which should probably be served as a static file
    $uri = urldecode(
        parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
    );
    if (is_file(__DIR__ . $uri)) {
        return false;
    }
}

/**
 * @var \Pgraph\Core\Application $app
 */
$app = require __DIR__ . '/../bootstrap.php';

/**
 * Runs application for incomming request and produces an HTTP response.
 */
$app->run(
    Pgraph\Http\requestFromServerParams()
);