<?php

namespace App\Http\Controllers\Master;

use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use App\Entities\User;
use App\Entities\Branch;
use Spatie\Permission\Models\Role;
use App\Services\Contracts\UserServiceContract;
use Hash;
use Auth;

class UserController extends Controller
{
    protected $user;

    public function __construct(UserServiceContract $user)
    {
        $this->user = $user;
    }
    
    public function index()
    {
        // site_permission('users-display', 403);
        
        $users = $this->user->getAll();
        
        return view('master.user.index', compact('users'));
    }
    
    public function create()
    {
        // site_permission('users-create', 403);

        $roles = Role::all();

        return view('master.user.create', compact('roles'));
    }

    public function store(UserRequest $request)
    {
        $data = $request->all();
        
        $data['password'] = Hash::make($request->password);

        $user = $this->user->create($data);
        
        $user->roles()->sync([$request->role_id]);
        
        return redirect()->route('master.users.index');
    }
    
    public function show($id)
    {
        site_permission('users-read', 403);

        return view('master.user.show', ['user' => $this->user->find($id)]);
    }
    
    public function edit($id)
    {
        site_permission('users-update', 403);

        $user =  $this->user->find($id);

        return view('master.user.edit',compact('user'));
    }
    
    public function update(UserRequest $request, $id)
    {
        $data = $request->all();
        
        if (isset($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            $data = array_except($data, array('password'));
        }

        $this->user->update($data, $id);

        return redirect()->route('master.users.index');
    }

    public function destroy($id)
    {
        site_permission('users-delete', 403);

        if ($id == Auth::user()->id) {
            return redirect()->back()
                ->with(['error' => 'Users who are currently logged in cannot be deleted']);
        }

        $this->user->delete($id);
        
        return redirect()->route('master.users.index');
    }
}