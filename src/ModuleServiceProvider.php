<?php 

namespace Sameer\Module;

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
        
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // $this->app->bind('mcm', function($app){
        //     return new ModuleCreater(config('ModuleCreater.moduleCreater'));

        // });
    }

}