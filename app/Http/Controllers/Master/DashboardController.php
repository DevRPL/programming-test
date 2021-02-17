<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Entities\Departement;
use App\Entities\Division;
use App\Entities\Employee;
use App\Entities\User;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departement = Departement::count();

        $division = Division::count();
        
        $employees = Employee::count();


        $users = User::count();

        return view('master.dashboard.index', compact('departement', 'division', 'employees', 'users'));
    }
}
