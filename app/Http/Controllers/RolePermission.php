<?php

namespace App\Http\Controllers;

use App\Permission;
use App\Role;
use Illuminate\Http\Request;

class RolePermission extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Role $role
     * @return \Illuminate\Http\Response
     */
    public function index(Role $role)
    {
        $permissions = Permission::all();

        return view('admin/role_permision/index', compact('role', 'permissions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $role_id = request('role_id');
        $permission_id = request('permission_id');

        $role = Role::find($role_id);
        $permission = Permission::find($permission_id);

        if(request('enabled')){
            $role->detachPermission($permission);
        } else{
            $role->attachPermission($permission);
        }
    }
}
