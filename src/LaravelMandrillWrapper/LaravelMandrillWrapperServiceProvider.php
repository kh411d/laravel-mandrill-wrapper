<?php 
namespace LaravelMandrillWrapper;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;

class LaravelMandrillWrapperServiceProvider extends ServiceProvider {

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
		$this->package('kh411d/laravel-mandrill-wrapper');
		$this->app['config']->package('kh411d/laravel-mandrill-wrapper', __DIR__.'/../config');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{		

		App::singleton('mandrill.wrapper', function ($app) {
			$apikey = Config::get('laravel-mandrill-wrapper::apikey');	
			$mandrill = new \Mandrill($apikey);
			return $mandrill;
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