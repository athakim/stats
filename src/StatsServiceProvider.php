<?php
namespace Athakim\Stats;

use Illuminate\Support\ServiceProvider;

/**
* 
*/
class StatsServiceProvider extends ServiceProvider
{
	public function boot()
	{
		include __DIR__ . '/routes.php';

		$this->loadViewsFrom(__DIR__ . '/views','stats');
	}

	public function register()
	{
		$this->app['stats'] = $this->app->share(function($app){

			return new Stats;
		});		
	}
}