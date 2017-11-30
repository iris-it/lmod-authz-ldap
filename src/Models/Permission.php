<?php

namespace Irisit\AuthzLdap\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{

    protected $table = 'permissions';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'label',
        'description'
    ];

    /**
     * a permission belongs to a role
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles()
    {
        return $this->belongstoMany('Irisit\AuthzLdap\Models\Role');
    }
}
