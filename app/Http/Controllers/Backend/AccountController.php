<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use App\Notifications\ResetPassword;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

//use Illuminate\Notifications\Notification;
use Notification;

class AccountController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            return view("backend.paginas.login");
        }
        return redirect('/backend');
    }

    public function login(Request $request)
    {
        $credentials = $request->only("correo", "password");

        if (Auth::attempt($credentials)) {
            return redirect()->intended("backend");
        } else {
            $request->session()->flash('error', __('backend.usuario_incorrecto'));
            return redirect()->action("Backend\AccountController@index")->withInput();
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->action('Backend\AccountController@index');
    }

    public function requestResetPassword()
    {
        return view("backend.paginas.reset.request");
    }

    public function sendResetPassword(Request $request)
    {
        $user = Usuario::where('correo', $request->input('correo'))->first();
        if ($user != null) {
            $user->token = str_random(60);

            $user->save();

            Notification::route('mail', $user->correo)->notify(new ResetPassword($user->token));

            $request->session()->flash('info', __('backend.mensaje_recuperacion_enviado'));

            return redirect()->action('Backend\AccountController@index');
        } else{
            $request->session()->flash('error', __('backend.usuario_inexistente'));
        }
        return redirect()->action('Backend\AccountController@requestResetPassword')->withInput();
    }

    public function resetPassword($token)
    {
        $user = Usuario::where('token', $token)->first();
        if ($user != null && $token != '') {

            $data['correo'] = $user->correo;
            $data['token'] = $token;

            return view("backend.paginas.reset.set", $data);
        }

        return redirect()->action('Backend\AccountController@index');
    }

    public function setNewPassword(Request $request)
    {
        $user = Usuario::where('token', $request->input('token'))->first();
        if ($user != null) {
            if ($request->password == $request->repeat_password) {
                $user->password = Hash::make($request->password);
                $user->token = '';
                $user->save();

                return redirect()->action('Backend\AccountController@index');
            } else {
                $request->session()->flash('error', __('backend.contraseña_no_coincide'));
            }
        } else {
            $request->session()->flash('error', __('backend.token_invalido'));

            return redirect()->action('Backend\AccountController@index}');
        }
        return redirect()->action('Backend\AccountController@resetPassword', ['token' => $request->input('token')])->withInput();
    }
}
