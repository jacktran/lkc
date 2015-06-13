<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Controllers\Client\JsonConverterController;

class BackendServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {


        $this->app->bind(
            'Models\DataType\DataTypeRepositoryInterface',
            'Models\DataType\DataTypeRepository'
        );

        $this->app->bind(
            'Models\AccessModifier\AccessModifierRepositoryInterface',
            'Models\AccessModifier\AccessModifierRepository'

        );
        $this->app->bind(
            'Models\DataTypeKey\DataTypeKeyRepositoryInterface',
            'Models\DataTypeKey\DataTypeKeyRepository'

        );
        $this->app->bind(
            'Modules\Infrastructure\RepositoryInterface',
            'Modules\Infrastructure\EloquentRepository'
        );

        $this->app->bind(
            'Models\Collection\CollectionRepositoryInterface',
            'Models\Collection\CollectionRepository'
        );
        $this->app->bind(
          'Models\User\UserRepositoryInterface',
          'Modules\Infrastructure\User\EloquentUserRepository'
        );

        $this->app->bind(
            'Models\PLanguage\PLanguageRepositoryInterface',
            'Modules\Infrastructure\PLanguage\EloquentPLanguageRepository'
        );

        $this->app->tag([
            'Models\DataType\DataTypeRepositoryInterface',
            'Models\PLanguage\PLanguageRepositoryInterface',
            'Models\AccessModifier\AccessModifierRepositoryInterface',
            'Models\DataTypeKey\DataTypeKeyRepositoryInterface',
            'Models\Collection\CollectionRepositoryInterface'
        ],'ProgramLanguageInfoTag');
    }

}
