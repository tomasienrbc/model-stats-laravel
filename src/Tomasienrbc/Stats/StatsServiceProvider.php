<?php namespace Tomasienrbc\Stats;

use Illuminate\Support\ServiceProvider;

class StatsServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */

	public function boot() {
		require __DIR__ . '/routes.php';
		// $this->package("tomasienrbc/stats","stats");
	}

	public function register()
	{
		$this->app->bind('stats',function() {
			return new Stats();
		});
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}

}
