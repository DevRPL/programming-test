<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Entities\Employee;
use App\Entities\DivDepartement;
use App\Entities\Departement;
use Illuminate\Http\Request;
use DB;

class EmployeesController extends Controller
{
    public function __construct()
    {

    }
    
    public function index()
    {
        site_permission('employees-display', 403);
        
        $employees = Employee::all();
        
        return view('master.employee.index', compact('employees'));
    }
    
    public function create()
    {
        site_permission('employees-create', 403);

        $departements = Departement::all();

        return view('master.employee.create', compact('departements'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        
        Employee::create($data);
        
        return redirect()->route('master.employees.index');
    }
    
    public function show($id)
    {
        site_permission('employees-read', 403);

        return view('master.employee.show', ['employee' => Employee::find($id)]);
    }
    
    public function edit($id)
    {
        site_permission('employees-update', 403);

        $employee =  Employee::find($id);

        return view('master.employee.edit',compact('employee'));
    }
    
    public function update(Request $request, $id)
    {
        $data = $request->all();
        
        Employee::find($id)->update([$data]);

        return redirect()->route('master.employees.index');
    }

    public function destroy($id)
    {
        site_permission('employees-delete', 403);

        Employee::find($id)->delete();
        
        return redirect()->route('master.employees.index');
    }

    public function getDivision($id)
    {
        $division = DivDepartement::with('division')->where('departement_id', $id)->get();
        
        return response()->json($division);
    }
}