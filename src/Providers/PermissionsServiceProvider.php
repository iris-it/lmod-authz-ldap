<?php

namespace Irisit\AuthzLdap\Providers;

use Irisit\AuthzLdap\Models\Permission;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Schema;

class PermissionsServiceProvider extends ServiceProvider
{

    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Bootstrap any application services.
     *
     * @param GateContract $gate
     * @return void
     */
    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);


        foreach ($this->getPermissions() as $permission) {
            $gate->define($permission->name, function ($user) use ($permission) {
                if ($user->hasRole('admin')) {
                    return true;
                }

                if (env('ENABLE_APP_PERMISSIONS') == true) {
                    return $user->hasPermission($permission->name);
                } else {
                    return true;
                }
            });
        }
    }

    /**
     * Retrieve ALL the permissions with eager loading
     *
     * @return mixed
     */
    protected function getPermissions()
    {
        if (Schema::hasTable('permissions')) {
            return Permission::with('roles')->get();
        }

        return [];
    }
}