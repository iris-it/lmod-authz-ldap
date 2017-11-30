<?php


use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Irisit\AuthzLdap\Http\Controllers', 'middleware' => 'web'], function () {

    Route::group(['prefix' => 'auth', 'namespace' => 'Auth'], function () {

        Route::get('login', 'LoginController@showLoginForm')->name('authz.get_login');
        Route::post('login', 'LoginController@login')->name('authz.post_login');

        Route::post('logout', 'LoginController@logout')->name('authz.post_logout');
        Route::get('logout', 'LoginController@logout')->name('authz.post_logout');

    });

    Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth', 'role:' . config('irisit_authz.admin_allowed_roles')]], function () {

        Route::group(['prefix' => 'users'], function () {

            Route::get('/', 'UsersController@index')->name('authz.admin_index_users');

            Route::get('{id}/edit', 'UsersController@edit')->name('authz.admin_edit_users');
            Route::put('{id}/update', 'UsersController@update')->name('authz.admin_update_users');

            Route::get('{id}/delete', 'UsersController@delete')->name('authz.admin_delete_users');
            Route::delete('{id}/destroy', 'UsersController@destroy')->name('authz.admin_destroy_users');

            Route::post('trigger/ldap', 'UsersController@triggerLdapSync')->name('authz.admin_trigger_ldap_sync');
        });


        Route::group(['prefix' => 'roles'], function () {

            Route::get('/', 'RolesController@index')->name('authz.admin_index_roles');

            Route::get('create', 'RolesController@create')->name('authz.admin_create_roles');
            Route::post('store', 'RolesController@store')->name('authz.admin_store_roles');

            Route::get('{id}/edit', 'RolesController@edit')->name('authz.admin_edit_roles');
            Route::put('{id}/update', 'RolesController@update')->name('authz.admin_update_roles');

            Route::get('{id}/delete', 'RolesController@delete')->name('authz.admin_delete_roles');
            Route::delete('{id}/destroy', 'RolesController@destroy')->name('authz.admin_destroy_roles');

            Route::put('{id}/sync/permissions', 'RolesController@syncPermissions')->name('authz.admin_sync_roles_permissions');
        });


        Route::group(['prefix' => 'permissions'], function () {

            Route::get('/', 'PermissionsController@index')->name('authz.admin_index_permissions');

            Route::get('create', 'PermissionsController@create')->name('authz.admin_create_permissions');
            Route::post('store', 'PermissionsController@store')->name('authz.admin_store_permissions');

            Route::get('{id}/edit', 'PermissionsController@edit')->name('authz.admin_edit_permissions');
            Route::put('{id}/update', 'PermissionsController@update')->name('authz.admin_update_permissions');

            Route::get('{id}/delete', 'PermissionsController@delete')->name('authz.admin_delete_permissions');
            Route::delete('{id}/destroy', 'PermissionsController@destroy')->name('authz.admin_destroy_permissions');

            Route::put('{id}/sync/roles', 'PermissionsController@syncRoles')->name('authz.admin_sync_permissions_roles');

            Route::post('trigger/scan', 'PermissionsController@triggerScanPermission')->name('authz.admin_trigger_scan_permissions');
        });


    });

});