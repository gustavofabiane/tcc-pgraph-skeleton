<?php

namespace App\Providers;

use Pgraph\Core\Application;
use Pgraph\Router\RouterProvider as Provider;

class RouterProvider extends Provider
{
    /**
     * Register and configure router component services.
     *
     * @param Application $app
     * @return void
     */
    public function provide(Application $app)
    {
        // $app->register();

        //-----------------------------------
        parent::provide($app);
    }
}
