<?php 

namespace Hestabit\Module;

use Illuminate\Support\ServiceProvider;

class ModuleServiceProvider extends ServiceProvider
{
	/**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/routes.php');
        $this->loadViewsFrom(__DIR__.'/views', 'module');
        $this->publishes([
        __DIR__.'/views' => resource_path('views/vendor/module'),
    ]);
        
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        
    }

}
