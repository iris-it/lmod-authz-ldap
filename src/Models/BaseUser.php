<?php

namespace Irisit\AuthzLdap\Models;


use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Access\Authorizable;

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
     * @return \Illuminate\Database\Eloquent\Relations\belongstoMany
     */
    public function roles()
    {
        return $this->belongstoMany('Irisit\AuthzLdap\Models\Role', 'role_user', 'user_id', 'role_id');
    }

    /**
     * this assign roles to an user (obvious isn'it ?)
     *
     * @param $role
     * @return Model
     */
    public function assignRole(Role $role)
    {
        return $this->roles()->save($role);
    }

    /**
     * check if user has role
     *
     * @param $name
     * @return bool
     */
    public function hasRole($name)
    {
        if (is_string($name)) {
            foreach ($this->roles as $role) {
                if ($role->name == $name) {
                    return true;
                }
            }
        }

        return false;
    }

    /**
     * check if user has role
     *
     * @param $name
     * @return bool
     */
    public function hasPermission($name)
    {
        if (is_string($name)) {
            foreach ($this->roles as $role) {
                foreach ($role->permissions as $permission) {
                    if ($permission->name == $name) {
                        return true;
                    }
                }
            }
        }

        return false;
    }


}