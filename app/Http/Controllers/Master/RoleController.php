<?php

namespace App\Http\Controllers\Master;

use App\Http\Requests\RoleRequest;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use App\Entities\Permission;

class RoleController extends Controller
{
    public function index()
    {
        // site_permission('roles-display', 403);
        
        $roles = Role::all();

        return view('master.role.index', compact('roles'));
    }
    
    public function create()
    {
        // site_permission('roles-create', 403);

        $permissions = Permission::all();
        
        $menus =  Permission::groupBy('menu_id')->get(['menu_id']);
        
        return view('master.role.create', compact('permissions', 'menus'));
    }
    
    public function store(RoleRequest $request)
    {
        $check_level = Role::orderBy('id', 'Desc')->first(['level']) ?? 0;

        $level = $check_level->level + 1;
        
        $request->merge(['guard_name' => 'web', 'level' => $level]);
        
        $role = Role::create($request->only(['name', 'guard_name', 'level']));
        
        $role->permissions()->sync($request->permission_id);

        return redirect()->route('master.roles.index');
    }
    
    public function show($id)
    {
        // site_permission('roles-read', 403);

        $role = Role::find($id);

        $permission_ids = collect($role->permissions)->pluck('id')->toArray();

        $permissions = Permission::all();

        $menus =  Permission::groupBy('menu_id')->get(['menu_id']);
           
        return view('master.role.show', compact('role', 'menus', 'permissions', 'permission_ids'));
    }
    
    public function edit($id)
    {
        site_permission('roles-update', 403);

        $role = Role::find($id);
        
        $permission_ids = collect($role->permissions)->pluck('id')->toArray();
        
        $menus =  Permission::groupBy('menu_id')->get(['menu_id']);
        
        $permissions = Permission::all();
        
        return view('master.role.edit', compact('role', 'permission_ids', 'menus', 'permissions'));
    }
    
    public function update(RoleRequest $request, Role $role)
    {
        $role->update(['name' => $request->name]);
        
        $role->permissions()->sync($request->permission_id);

        return redirect()->route('master.roles.index');
    }

    public function destroy($id)
    {
        //
    }
}
