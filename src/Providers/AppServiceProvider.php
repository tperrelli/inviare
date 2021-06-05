<?php

namespace Tperrelli\Inviare\Providers;

use Tperrelli\Inviare\Inviare;
use Illuminate\Support\ServiceProvider;
use Tperrelli\Inviare\Repositories\AbstractRepository;
use Tperrelli\Inviare\Repositories\CampaignRepository;
use Tperrelli\Inviare\Repositories\CategoryRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadConfigs();

        $this->loadMigrations();
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerRepositories();
        
        $this->registerInviare();
        
        $this->loadHelpers();
    }

    protected function loadConfigs()
    {
        $this->publishes([
            __DIR__ . '/../../config/inviare.php' => config_path('inviare.php')
        ]);
    }

    protected function loadMigrations()
    {
        $this->publishes([
            __DIR__ . '/../../database/migrations/' => database_path('migrations')
        ]);
    }

    protected function registerRepositories()
    {
        $this->app->bind('inviare.campaign.repository', function($app) {
            return new CampaignRepository($app);
        });
        
        $this->app->bind('inviare.category.repository', function($app) {
            return new CategoryRepository($app);
        });
    }

    protected function registerInviare()
    {
        $this->app->singleton('inviare', function($app) {
            return new Inviare(
                $app->make('inviare.campaign.repository'),
                $app->make('inviare.category.repository')
            );
        });
    }

    /**
     * Load the helpers file.
     */
    private function loadHelpers()
    {
        //
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['inviare', 'inviare.repository'];
    }
}
