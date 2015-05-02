<?php namespace Itestense\LaravelPhotogallery;
use Illuminate\Support\ServiceProvider;

class LaravelPhotogalleryServiceProvider extends ServiceProvider {

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
    $this->package('itestense/laravel-photogallery');
    $this->app->register('Intervention\Image\ImageServiceProvider');
    include __DIR__.'/../../routes.php';
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
    $loader = \Illuminate\Foundation\AliasLoader::getInstance();
    $loader->alias('Image', 'Intervention\Image\Facades\Image');
    $loader->alias('Utils', 'Itestense\LaravelPhotogallery\Utils\Utils');
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
