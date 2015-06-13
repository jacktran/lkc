<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Models\Tool\ToolRepository as ToolRepository;

class ViewComposerServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    protected $toolRep;

    public function boot(ToolRepository $toolRep)
    {
        // dependency injection
        $this->toolRep = $toolRep;
        //share tool data to partials view
        view()->composer('partials.left_menu', function ($view) {
            $view->with('tools', $this->toolRep->getAll(array('name', 'name_url', 'description')));
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {

        //
    }

}
