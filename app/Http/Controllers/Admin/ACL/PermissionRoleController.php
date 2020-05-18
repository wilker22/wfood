<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class PermissionRoleController extends Controller
{
    protected $role, $permission;

    public function __construct(Role $role, Permission $permission)
    {
        $this->role = $role;
        $this->permission = $permission;

        $this->middleware(['can:roles']);
    }

    public function permissions($idrole)
    {
        $role = $this->role->find($idrole);
        if(!$role){
            return redirect()->back();
        }

        $permissions = $role->permissions()->paginate();

        return view('admin.pages.roles.permissions.permissions', compact('permissions', 'role'));
    }

    public function roles($idPermission)
    {
        if (!$permission = $this->permission->find($idPermission)) {
            return redirect()->back();
        }

        $roles = $permission->roles()->paginate();

        return view('admin.pages.permissions.roles.roles', compact('permission', 'roles'));
    }


    public function permissionsAvailable(Request $request, $idrole)
    {
        if(!$role = $this->role->find($idrole)){
            return redirect()->back();
        }
        $filters = $request->except('_token');
        $permissions = $role->permissionsAvailable($request->filter);
        return view('admin.pages.roles.permissions.available', compact('role', 'permissions', 'filters'));
    }

    public function attachPermissionsRole(Request $request, $idrole)
    {
        if (!$role = $this->role->find($idrole)) {
            return redirect()->back();
        }

        if (!$request->permissions || count($request->permissions) == 0) {
            return redirect()
                        ->back()
                        ->with('info', 'Precisa escolher pelo menos uma permissão');
        }

        $role->permissions()->attach($request->permissions);

        return redirect()->route('roles.permissions', $role->id);
    }

    public function detachPermissionrole($idrole, $idPermission)
    {
        $role = $this->role->find($idrole);
        $permission = $this->permission->find($idPermission);

        if (!$role || !$permission) {
            return redirect()->back();
        }

        $role->permissions()->detach($permission);

        return redirect()->route('roles.permissions', $role->id);
    }
}
