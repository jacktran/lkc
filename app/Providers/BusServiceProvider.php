<?php namespace App\Providers;

use Illuminate\Bus\Dispatcher;

use Illuminate\Support\ServiceProvider;

class BusServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap any application services.
	 *
	 * @param  \Illuminate\Bus\Dispatcher  $dispatcher
	 * @return void
	 */
	public function boot(Dispatcher $dispatcher)
	{
		$dispatcher->mapUsing(function($command)
		{
            $name = get_class($command);
            $commandNamespace = substr($name, 0, strrpos($name, '\\'));
            $handlerNamespace = str_replace('Command', 'CommandHandler', $commandNamespace);
            return Dispatcher::simpleMapping(
                $command, $commandNamespace , $handlerNamespace
            );
		});
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
