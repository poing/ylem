<?php 

namespace Ylem\ServiceProvider;

use Illuminate\Support\ServiceProvider;

class YlemServiceProvider extends ServiceProvider {

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot() {

        //$this->handleConfigs();
        $this->handleMigrations();
        $this->handleViews();
        // $this->handleTranslations();
        $this->handleRoutes();
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register() {

        // Bind any implementations.

    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides() {

        return [];
    }

    private function handleConfigs() {

        $configPath = __DIR__ . '/../config/packagename.php';

        $this->publishes([$configPath => config_path('packagename.php')]);

        $this->mergeConfigFrom($configPath, 'packagename');
    }

    private function handleTranslations() {

        $this->loadTranslationsFrom(__DIR__.'/../lang', 'packagename');
    }

    private function handleViews() {

        $this->loadViewsFrom(__DIR__.'/../views', 'packagename');

        $this->publishes([base_path('vendor/poing/ylem/views') => base_path('resources/views/ylem')]);
    }

    private function handleMigrations() {

        $this->publishes([base_path('vendor/poing/ylem/migrations') => base_path('database/migrations')]);
    }

    private function handleRoutes() {

        include base_path('vendor/poing/ylem/routes.php');
    }
}
