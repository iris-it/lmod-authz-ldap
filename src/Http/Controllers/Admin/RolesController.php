<?php

namespace Irisit\AuthzLdap\Http\Controllers\Admin;

use Exception;
use Illuminate\Support\Facades\Artisan;
use Irisit\AuthzLdap\Http\Requests\Admin\AdminRolePermissionRequest;
use Irisit\AuthzLdap\Http\Requests\Admin\AdminRoleRequest;
use Irisit\AuthzLdap\Http\Controllers\Controller;
use Irisit\AuthzLdap\Models\Permission;
use Irisit\AuthzLdap\Models\Role;
use Laracasts\Flash\Flash;

class RolesController extends Controller
{

    public function index()
    {
        $roles = Role::paginate(10);

        return view('authz::admin.roles.index')->with(compact('roles'));
    }

    public function create()
    {
        return view('authz::admin.roles.create');
    }

    public function store(AdminRoleRequest $request)
    {
        $data = $request->all();

        if (Role::create($data)) {
            Flash::success(__('Create role success'));
        } else {
            Flash::error(__('Create role failed'));
        }

        return redirect(route('authz.admin_index_roles'));
    }

    public function edit($id)
    {
        $role = Role::findOrFail($id);

        $permissions = Permission::orderBy('name')->pluck('name', 'id');

        return view('authz::admin.roles.edit')->with(compact('role', 'permissions'));
    }

    public function update(AdminRoleRequest $request, $id)
    {
        $role = Role::findOrFail($id);

        $data = $request->all();

        if ($role->update($data)) {
            Flash::success(__('Update role success'));
        } else {
            Flash::error(__('Update role failed'));
        }

        return redirect(route('authz.admin_index_roles'));
    }

    public function delete($id)
    {
        $role = Role::findOrFail($id);

        return view('authz::admin.roles.delete')->with(compact('role'));
    }

    public function destroy($id)
    {
        $role = Role::findOrFail($id);

        if (!in_array($role->name, ["admin", "manager", "user"]) && $role->delete()) {
            Flash::success(__('Delete role success'));
        } else {
            Flash::error(__('Delete role failed'));
        }

        return redirect(route('authz.admin_index_roles'));
    }

    public function syncPermissions(AdminRolePermissionRequest $request, $id)
    {
        $role = Role::findOrFail($id);

        $data = $request->all();

        if (!$request->has("permissions")) {
            $data["permissions"] = [];
        }

        if ($role->permissions()->sync($data["permissions"])) {
            Flash::success(__('Update role success'));
        } else {
            Flash::error(__('Update role failed'));
        }

        return redirect(route('authz.admin_index_roles'));
    }

    public function triggerRolesSync()
    {
        try {
            define('STDOUT', fopen('php://stdout', 'w'));
            Artisan::call('import:ldap_groups');
        } catch (Exception $e) {
            Flash::error(__('Scan roles failed'));
        }
        Flash::success(__('Scan roles success'));

        return redirect(route('authz.admin_index_roles'));
    }

}
