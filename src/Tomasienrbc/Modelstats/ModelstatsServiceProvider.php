<?php namespace Tomasienrbc\Modelstats;

use Illuminate\Support\ServiceProvider;

class ModelstatsServiceProvider extends ServiceProvider {

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
	public function boot()
	{
		$this->package('tomasienrbc/modelstats','statspage');
		$this->loadViewsFrom(__DIR__.'/views', 'statspage');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	 public function register()
	 {

		 $this->app['statspage'] = $this->app->share(function($app)
		 {
				 return new Statspage;
		 });

		 // Shortcut so developers don't need to add an Alias in app/config/app.php
		 $this->app->booting(function()
		 {
				 $loader = \Illuminate\Foundation\AliasLoader::getInstance();
				 $loader->alias('UnderlyingClass', 'Tomasienrbc\Modelstats\Facades\Statspage');
		 });
	 }

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array("tomasienrbc says what's up");
	}

}