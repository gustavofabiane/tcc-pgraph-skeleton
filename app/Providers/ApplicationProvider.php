<?php

namespace App\Providers;

use RedBeanPHP\R;
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

        /**
         * Setup Redbean PHP connection
         */
        $dbConfig = $app->config->get('app', 'database');
        R::setup($dbConfig['dsn'], $dbConfig['user'], $dbConfig['password']);

        //-----------------------------------
        parent::provide($app);
    }
}
