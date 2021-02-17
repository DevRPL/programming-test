<?php

namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Entities\Menu;

class MenuController extends Controller
{
    public function create()
    {
        site_permission('menus-create', 403);

        return view('master.menu.create');
    }

    public function store(Request $request)
    {
        Menu::create($request->all());

        return redirect()->route('master.menus.create');
    }
}
