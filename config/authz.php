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
    | Allowed roles for admin section
    |--------------------------------------------------------------------------
    |
    | Roles for admin section, separated by commas
    |
    */

    'admin_allowed_roles' => 'admin,manager',

    /*
    |--------------------------------------------------------------------------
    | Load routes ?
    |--------------------------------------------------------------------------
    |
    | Choose to load routes or not ( for override purposes )
    |
    */

    'load_routes' => true,

];