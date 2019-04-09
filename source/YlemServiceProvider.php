<?php

namespace Poing\Ylem;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Factory as EloquentFactory;
//use Illuminate\Foundation\AliasLoader;
//use Poing\Ylem\Facades\Facade as YlemFacade;
//use Poing\Ylem\Models\Individual as Individual;

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

        $this->publishes(
            [__DIR__.'/public' => public_path('ylem')], 'ylem');

        // Load Migrations
        $this->loadMigrationsFrom(__DIR__.'/Database/migrations');

        // Load Commands
        if ($this->app->runningInConsole()) {
            $this->commands([
                \Poing\Ylem\Commands\YlemSeeder::class,
                \Poing\Ylem\Commands\YlemPublish::class,
                \Poing\Ylem\Commands\YlemVue::class,
            ]);
        }

		// Add all routes
		$this->app->register('Poing\Ylem\Providers\YlemRouteServiceProvider');

        // Load Web Routes (Figured we don't need this and it creates namespace issues)
        /* $this->loadRoutesFrom(__DIR__.'/routes/web.php'); */


        //$this->handleConfigs();
        //$this->handleMigrations();
        $this->handleViews();
        // $this->handleTranslations();
        //$this->handleRoutes();
        //$loader = AliasLoader::getInstance();
        //$loader->alias('Individual', Poing\Ylem\Models\Individual::class);

    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register() {

        // Register Factories
        $this->registerEloquentFactoriesFrom(__DIR__.'/Database/factories');

          //$this->handleMigrations();
        // Bind any implementations.
        //$loader = AliasLoader::getInstance();
        //$loader->alias('Individual', Poing\Ylem\Models\Individual::class);


    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides() {

        return [];
    }

    /**
     * Register factories.
     *
     * @param  string  $path
     * @return void
     */
    protected function registerEloquentFactoriesFrom($path)
    {
        $this->app->make(EloquentFactory::class)->load($path);
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

        $this->loadViewsFrom(__DIR__.'/Views', 'ylem');

        /* $this->publishes([base_path('vendor/poing/ylem/views') => base_path('resources/views/ylem')]); */
    }

    private function handleMigrations() {

        //$this->command->info('Creating migrations.');

        /*
        $this->publishes([
            __DIR__ . '/database/migrations' => base_path('database/migrations')
        ]);
        */
    }

    private function handleRoutes() {

        include base_path('vendor/poing/ylem/routes.php');
    }
}
