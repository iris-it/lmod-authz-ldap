<?php

namespace Irisit\AuthzLdap\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{

    protected $table = 'roles';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'label',
        'description',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [

    ];

    /**
     * A role has many users
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongstoMany
     */
    public function users()
    {
        return $this->belongstoMany('Irisit\AuthzLdap\Models\BaseUser','role_user', 'role_id','user_id');
    }

    /**
     * A role has many permissions
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function permissions()
    {
        return $this->belongstoMany('Irisit\AuthzLdap\Models\Permission');
    }

    /**
     * this assign many permissions to a role
     *
     * @param Permission $permission
     * @return Model
     */
    public function givePermissionTo(Permission $permission)
    {
        return $this->permissions()->save($permission);
    }

}
