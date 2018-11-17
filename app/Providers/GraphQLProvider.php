<?php

namespace App\Providers;

use Pgraph\Core\Application;
use Pgraph\GraphQL\GraphQLProvider as Provider;

class GraphQLProvider extends Provider
{
    /**
     * Register and configure GraphQL component services.
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
