<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Auth;

class AccountController extends Controller
{
    public function index(){
        if (!Auth::check()){
            return view("backend.paginas.login");
        }
        return redirect('/backend');
    }

    public function login(Request $request){
        $credentials = $request->only("correo", "password");

        if (Auth::attempt($credentials)){
            return redirect()->intended("backend");
        } else {
            return redirect()->action("Backend\AccountController@index")->withInput();
        }
    }

    public function logout(){
        Auth::logout();

        return redirect()->action('Backend\AccountController@index');
    }
}
