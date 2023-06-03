<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('is_admin');
    }
    public function index(Request $request)
    {
        $data = Role::all();
        return view('role.index', ['data'=> $data]);
    }
    public function store(Request $request)
    {
        $data=$request->validate([
            'role'=>'required',
        ]);
        Role::create($data);
        return redirect()->route('role.index')
                        ->with('success','role created seccessfully');
    }
    public function create()
    {
        $role = Role::all();
        $array = [
            'role'=>$role,
        ];
        return view('role.create-role',$array);
    }
    public function update(Request $request,$id)
    {

    }
    public function edit($id)
    {
        $data= Role::find($id);
        $array = [
            'role'=>$data
        ];
        return view('role.index',$array);
    }
    public function destroy($id)
    {
        $data= Role::find($id);
        $data->delete();
        return redirect()->route('role.index');
    }
}
