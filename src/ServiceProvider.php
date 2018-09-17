<?php namespace Jake142\Service;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use Jake142\Service\Commands\CreateService;
use Jake142\Service\Commands\ListService;
use Jake142\Service\Commands\UpdateService;

class ServiceProvider extends BaseServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/config/appservices.php' => config_path('appservices.php')
        ]);
        //Setting up commands
        if ($this->app->runningInConsole()) {
            $this->commands([
                CreateService::class,
                ListService::class,
                UpdateService::class,
            ]);
        }
    }
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //$this->commands('Jake142\Service\Commands\Service');
        /*$this->app->singleton(MyPackage::class, function () {
            return new MyPackage();
        });
        $this->app->alias(MyPackage::class, 'laravel-service');*/
    }
}