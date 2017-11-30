# Authz Ldap Module

Documentation du module d'authentification et d'authorisation

## Fonctionnalités

#### Guest
- Sign in

#### Admin
- List of users
-- Assign role to user 
-- Trigger ldap sync

- List of permissions 
-- Parse from source file
-- Edit descriptions

- List of roles
-- Create role
-- Edit role 
--- Assign permissions to role

## Install

Begin by installing this package through Composer. Edit your project's composer.json file to require laravelcollective/html.

composer require `"laravelcollective/html":"^5.4.0"`
composer require `"adldap2/adldap2-laravel": "^3.0"`

Next, add your new provider to the providers array of config/app.php:

```php
  'providers' => [
    // ...
    Collective\Html\HtmlServiceProvider::class,
    Irisit\AuthzLdap\AuthzServiceProvider::class,
    Adldap\Laravel\AdldapServiceProvider::class,
    Adldap\Laravel\AdldapAuthServiceProvider::class,
    // ...
  ],
```

Finally, add two class aliases to the aliases array of config/app.php:

```php
  'aliases' => [
    // ...
      'Form' => Collective\Html\FormFacade::class,
      'Html' => Collective\Html\HtmlFacade::class,
      'Adldap' => Adldap\Laravel\Facades\Adldap::class,
    // ...
  ],
```

Replace all the in the `App\User::class`
```
<?php

namespace App;

use Adldap\Laravel\Traits\HasLdapUser;
use Illuminate\Notifications\Notifiable;
use Irisit\AuthzLdap\Models\BaseUser as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, HasLdapUser;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname',
        'lastname',
        'username',
        'email',
        'password',
        'role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
```


Replace in migrations the `name` attribute by 
```
$table->string('firstname');
$table->string('lastname');
$table->string('username')->unique();
```

Replace the line in `App\Http\Kernel.php`

`'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,`

by

`'guest' => \Irisit\AuthzLdap\Http\Middleware\RedirectIfAuthenticated::class,`

And add at the end ( after guest )
 
`'role' => \Irisit\AuthzLdap\Http\Middleware\RedirectIfNotRole::class,`

so you can use the middleware 'role' to protect a route or a group like this `middleware => 'role:admin,manager'`


Run 

`php artisan db:seed --class=Irisit\AuthzLdap\Database\Seeds\DatabaseSeeder`

Add to config/filesystem.php

```
        'base' => [
            'driver' => 'local',
            'root' => base_path() . DIRECTORY_SEPARATOR,
        ],
```

Add this to app/Exceptions/Handler.php
```php
/**
 * @override
 * @param \Illuminate\Http\Request $request
 * @param AuthenticationException $exception
 * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
 */
protected function unauthenticated($request, AuthenticationException $exception)
{
    return $request->expectsJson()
        ? response()->json(['message' => 'Unauthenticated.'], 401)
        : redirect()->guest(route('authz.get_login'));
}
```


And run `php artisan vendor:publish --provider="Irisit\AuthzLdap\AuthzServiceProvider"` to get the configuration file and the seeder file 

For the seeder add `$this->call(RoleTableSeeder::class);` to the `/database/seeders/DatabaseSeeder.php`