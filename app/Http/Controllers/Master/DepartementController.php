<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Entities\Departement;
use App\Entities\Division;
use Illuminate\Http\Request;

class DepartementController extends Controller
{
    public function __construct()
    {

    }
    
    public function index()
    {
        site_permission('departements-display', 403);
        
        $departements = Departement::all();
        
        return view('master.departement.index', compact('departements'));
    }
    
    public function create()
    {
        site_permission('departements-create', 403);
        $departements = Departement::all();

        return view('master.departement.create', compact('departements'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        
        $departement = Departement::create([
            'code' => $data['code'],
            'name' => $data['name']
        ]);

        foreach ($data['division_code'] as $key => $code) { 
            $division = Division::create([
                'code' => $code,
                'name' => $data['division_name'][$key]
            ]);
            $departement->divisions()->attach($division->id);
        }

        return redirect()->route('master.departements.index');
    }
    
    public function show($id)
    {
        site_permission('departements-read', 403);

        return view('master.departement.show', ['departement' => Departement::find($id)]);
    }
    
    public function edit($id)
    {
        abort(404);
    }
    
    public function update(Request $request, $id)
    {
        abort(404);
    }

    public function destroy($id)
    {
        abort(404);
        // site_permission('users-delete', 403);

        // if ($id == Auth::user()->id) {
        //     return redirect()->back()
        //         ->with(['error' => 'Users who are currently logged in cannot be deleted']);
        // }

        // Departement::find($id)->delete();
        
        // return redirect()->route('master.departements.index');
    }
}