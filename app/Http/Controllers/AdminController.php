<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    //===================== ADMIN LOGIN ============================//
    public function index()
    {
        return view('admin.login');
    }

    public function login(Request $request){
        $validatedCredentials = $request->validate([
            'email' => 'required|email',
            'password'=>'required|min:8'
        ]);

        if(Auth::attempt($validatedCredentials)){
            return redirect()->route('dashboard');
        }

        return back()->withErrors([
            'error'=> 'Wrong email or password!'
        ]);

    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }


    //===================== END ADMIN LOGIN ============================//


    //===================== DASHBOARD ==================================//

    public function dashboard()
    {
        return view('admin.dashboard');
    }

}
