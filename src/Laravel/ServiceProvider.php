<?php

namespace NewsWhip\Laravel;

use Illuminate\Support\ServiceProvider as LaravelServiceProvider;

class ServiceProvider extends LaravelServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = true;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot() {

		$this->package('mcstutterfish/newswhip');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register() {

		$this->app->bind(
			'newswhip',
			function ($app) {

				$config = $app['config']->get('newswhip');

				if (!empty($config)) {

					$config = array_filter($config);

					return new \NewsWhip\NewsWhip($config);

				} else {
					return new \NewsWhip\NewsWhip();
				}

			}
		);

		$app = $this->app;

		$this->app->error(
			function (\RuntimeException $exception) use ($app) {

				$app['log']->warning($exception);
			}
		);
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides() {

		return ['newswhip'];

	}

}
