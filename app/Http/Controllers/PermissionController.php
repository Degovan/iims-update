<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:read-permission');
    }

    public function index()
    {
        $permissions = Permission::all();
        $roles = Role::all();

        return view('pages.permissions.index', compact('permissions', 'roles'));
    }

    public function mass_update(Request $request, $id)
    {
        $role = Role::findOrFail($id);

        $request->validate([
           'perms.*' => 'exists:permissions,name'
        ]);

        $role->syncPermissions($request->perms);
        return redirect()->back()->with('alert', [
            'type' => 'success',
            'msg' => 'Permissions has been saved'
        ]);
    }
}
