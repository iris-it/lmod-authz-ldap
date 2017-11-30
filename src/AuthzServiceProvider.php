<?php

namespace Irisit\AuthzLdap;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;
use Irisit\AuthzLdap\Console\Commands\ParsePermissions;
use Irisit\AuthzLdap\Console\Commands\LdapImport;
use Irisit\AuthzLdap\Http\Validators\HashValidator;

class AuthzServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        /*
         * Internal Stuff
         */
        $this->bootValidator();

        /*
         * Package Loading Stuff
         */
        $this->publishes([__DIR__ . '/../config/authz.php' => config_path('irisit_authz.php')], 'irisit-authz-config');

        $this->publishes([__DIR__ . '/../database/seeds/RoleTableSeeder.php' => database_path('seeds/RoleTableSeeder.php')], 'irisit-authz-seeder');

        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');

        $this->loadViewsFrom(__DIR__ . '/../resources/views/' . config('irisit_authz.base_theme'), 'authz');

        if (config('irisit_authz.load_routes')) {
            $this->loadRoutesFrom(__DIR__ . '/routes.php');
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/authz.php', 'irisit_authz');

        $this->app->register('Irisit\AuthzLdap\Providers\PermissionsServiceProvider');

        $this->app->register('Collective\Html\HtmlServiceProvider');

        $this->app->alias('Form', 'Collective\Html\FormFacade');

        $this->app->alias('Html', 'Collective\Html\HtmlFacade');

        $this->commands([ParsePermissions::class]);

        $this->commands([LdapImport::class]);
    }

    private function bootValidator()
    {
        // to use 'hash:' . $user->password
        Validator::resolver(function ($translator, $data, $rules, $messages) {
            return new HashValidator($translator, $data, $rules, $messages);
        });

        Validator::replacer('hash', function ($message, $attribute, $rule, $parameters) {
            return __('The password doesn\'t match our records');
        });
    }
}