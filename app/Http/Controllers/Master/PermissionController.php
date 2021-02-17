<?php

namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;
use App\Entities\Menu;
use Illuminate\Support\Str;

class PermissionController extends Controller
{
    public function index()
    {
        site_permission('permissions-index', 403);
    }
    
    public function create()
    {
        site_permission('permissions-create', 403);

        $permission_menus = Permission::groupBy('menu_id')->pluck('menu_id');
        
        $menus = Menu::whereNotIn('id', $permission_menus)->get();
        
        return view('master.permission.create', compact('menus'));
    }
    
    public function store(Request $request)
    {
        $menu = Menu::create(['name' => $request->menu]);
        
        $permissions = ['display', 'create', 'read', 'update', 'delete'];

        foreach ($permissions as $permission) {
            Permission::create([
                'name' => \Str::slug($request->menu) . '-' . $permission,
                'guard_name' => 'web',
                'menu_id' => $menu->id
            ]);
        }

        return redirect()->back();
    }
    
    public function show($id)
    {
        site_permission('permissions-read', 403);
    }
    
    public function edit($id)
    {
        site_permission('permissions-edit', 403);
    }
    
    public function update(PermissionRequest $request, Permission $permission)
    {
        //
    }
    
    public function destroy($id)
    {
        //
    }
}
