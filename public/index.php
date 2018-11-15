<?php

require '../vendor/autoload.php';

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