<?php
namespace App\Modules\Fabricante\Providers;

use App;
use Config;
use Lang;
use View;
use Illuminate\Support\ServiceProvider;

class FabricanteServiceProvider extends ServiceProvider
{
	/**
	 * Register the Fabricante module service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		// This service provider is a convenient place to register your modules
		// services in the IoC container. If you wish, you may make additional
		// methods or service providers to keep the code more focused and granular.
		App::register('App\Modules\Fabricante\Providers\RouteServiceProvider');

		$this->registerNamespaces();
	}

	/**
	 * Register the Fabricante module resource namespaces.
	 *
	 * @return void
	 */
	protected function registerNamespaces()
	{
		Lang::addNamespace('fabricante', realpath(__DIR__.'/../Resources/Lang'));

		View::addNamespace('fabricante', base_path('resources/views/vendor/fabricante'));
		View::addNamespace('fabricante', realpath(__DIR__.'/../Resources/Views'));
	}

    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/config.php' => config_path('fabricante.php'),
        ], 'config');

        // use the vendor configuration file as fallback
        $this->mergeConfigFrom(
            __DIR__.'/../config/config.php', 'fabricante'
        );
    }

}
