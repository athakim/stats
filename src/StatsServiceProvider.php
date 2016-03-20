<?php
namespace Athakim\Stats;

use Illuminate\Support\ServiceProvider;


class StatsServiceProvider extends ServiceProvider
{
	public function boot()
	{
		if (! $this->app->routesAreCached()) {
	        require __DIR__.'/routes.php';
	    }

		//$this->loadViewsFrom(resource_path('views/vendor/stats'),'stats');

		$this->publishes([
	        __DIR__.'/views' => resource_path('views/vendor/stats'),
	        __DIR__.'/config/stats.php' => config_path('stats.php'),
	    ]);

	    $this->publishes([
        __DIR__.'/assets' => public_path('vendor/stats'),
    	], 'public');

    	$this->publishes([
        __DIR__.'/migrations' => database_path('migrations')
    	], 'migrations');

	}

	public function register()
	{
		$this->app['stats'] = $this->app->share(function($app){

			return new Stats;
		});	

		// ou bien 
		
		// $this->app->bing('stats',function($app){
		// 	return new Stats;
		// });	
	}
}