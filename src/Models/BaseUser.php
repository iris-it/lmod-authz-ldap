<?php

namespace Irisit\AuthzLdap\Models;


use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

class BaseUser extends Model implements AuthenticatableContract, AuthorizableContract
{

    protected $table = 'users';

    use Authenticatable, Authorizable;

    public function username()
    {
        return 'username';
    }

    /**
     * An user has many roles
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function role()
    {
        return $this->belongsTo('Irisit\AuthzLdap\Models\Role');
    }

    /**
     * this assign roles to an user (obvious isn'it ?)
     *
     * @param $role
     * @return bool
     */
    public function assignRole($role)
    {
        $role = Role::where('name', $role)->firstOrFail();

        return $this->role()->associate($role)->save();
    }

    /**
     * check if user has role
     *
     * @param $role
     * @return bool
     */
    public function hasRole($role)
    {
        if (is_string($role)) {
            return $this->role->name == $role;
        }

        return false;
    }

    /**
     * check if user has role
     *
     * @param $permission
     * @return bool
     */
    public function hasPermission($permission)
    {
        if (is_string($permission)) {
            foreach ($this->role->permissions as $permissionRole) {
                if ($permissionRole->name == $permission) {
                    return true;
                }
            }
        }

        return false;
    }

}