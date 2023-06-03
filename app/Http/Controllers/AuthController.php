<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Ui\Presets\React;
use PhpParser\Node\Stmt\TryCatch;

class AuthController extends Controller
{
    public function index(){
        return view('auth.login');
    }

    public function register(){
        $role = Role::all();
        return view('auth.register',['role'=>$role]);
    }

    public function prosesRegister(Request $request){
        $data = new User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => hash('sha512',$request->password),
            'id_role' => $request->role
        ]);
        $data->save();
        return redirect()->route('login');
    }

    public function login(Request $request){
        $input = $request->all();

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        
        if (auth()->attempt(array('email' => $input['email'], 'password' => $input['password']))) {
            if (auth()->user()->id_role == 1) {
                return redirect()->route('dashboard-admin');
            } 
        } else {
            return redirect()->route('login');
        }

        if (auth()->attempt(array('email' => $input['email'], 'password' => $input['password']))) {
            if (auth()->user()->id_role == 2) {
                return redirect()->route('dashboard-customer');
            }
        } else {
            return redirect()->route('login');
        }

        if (auth()->attempt(array('email' => $input['email'], 'password' => $input['password']))) {
            if (auth()->user()->id_role == 3) {
                return redirect()->route('dashboard-supir');
            }
        } else {
            return redirect()->route('login');
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
