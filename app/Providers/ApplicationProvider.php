<?php

namespace App\Providers;

use Pgraph\Core\Application;
use Pgraph\Core\DefaultProvider;

class ApplicationProvider extends DefaultProvider
{
    /**
     * Register and configure application services.
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
