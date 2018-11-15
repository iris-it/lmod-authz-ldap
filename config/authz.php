<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Redirect Path
    |--------------------------------------------------------------------------
    |
    | This option controls the default redirect path after a
    | successful login or register
    |
    */

    'redirect_path' => 'home',

    /*
    |--------------------------------------------------------------------------
    | Redirect Unauthenticated
    |--------------------------------------------------------------------------
    |
    | This option controls the behavior of the exception ( App\Exceptions\Handler.php )
    | if not net 'login' route is used
    |
    */

    'redirect_unauthenticated' => 'authz.get_login',

    /*
    |--------------------------------------------------------------------------
    | Base Theme
    |--------------------------------------------------------------------------
    |
    | This option for choosing the theme ( uikit / pages / .. )
    |
    */

    'base_theme' => 'uikit',

    /*
    |--------------------------------------------------------------------------
    | Load routes ?
    |--------------------------------------------------------------------------
    |
    | Choose to load routes or not ( for override purposes )
    |
    */

    'load_routes' => true,

    /*
    |--------------------------------------------------------------------------
    | LDAP Filter
    |--------------------------------------------------------------------------
    |
    | in order to retrieve users not all the users
    |
    */

    'ldap_filters' => '(&(cn=*))',

    /*
    |--------------------------------------------------------------------------
    | Paginate ?
    |--------------------------------------------------------------------------
    |
    | Disable pagination for specific uses cases
    |
    */

    'pagination_enabled' => true,

    /*
    |--------------------------------------------------------------------------
    | Route Middleware
    |--------------------------------------------------------------------------
    |
    | Default Middleware for auth and guest routes
    | Roles for admin section, separated by commas
    |
    */

    'guest_route_middleware' => 'web',

    'auth_route_middleware' => ['auth', 'role:admin,manager']

];