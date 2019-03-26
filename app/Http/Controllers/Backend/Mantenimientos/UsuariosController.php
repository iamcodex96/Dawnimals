<?php

namespace App\Http\Controllers\Backend\Mantenimientos;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Usuario;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;


class UsuariosController extends Controller
{
    const PREFIX = "backend.paginas.mantenimientos.usuarios.";
    const CONTROLADOR = "Backend\Mantenimientos\UsuariosController@";

    public function index()
    {
        $data["usuarios"] = Usuario::all();

        return view(UsuariosController::PREFIX . "index", $data);
    }

    public function create()
    {
        $data["roles"] = Role::all();

        return view(UsuariosController::PREFIX . "create", $data);
    }

    public function store(Usuario $usuario, Request $request)
    {
        $usuario->nombre = $request->input("nombre");
        $usuario->nombre_usuario = $request->input("nombre_usuario");
        $usuario->correo = $request->input("correo");

        $password = $request->input("password");
        if ($password != null){
            $usuario->password = Hash::make($request->password);
        }

        try{
            $role = Role::find($request->input("role_id"));
            $usuario->roles_id = $role->id;
            $usuario->save();

        } catch (QueryException $ex){
            return redirect()->action(UsuariosController::CONTROLADOR . 'create')->withInput();
        }
        return redirect()->action(UsuariosController::CONTROLADOR . 'index');
    }

    public function edit(Usuario $usuario)
    {
        $data["roles"] = Role::all();
        $data["usuario"] = $usuario;

        return view(UsuariosController::PREFIX . "edit", $data);
    }

    public function update(Usuario $usuario, Request $request)
    {
        $usuario->nombre = $request->input("nombre");
        $usuario->nombre_usuario = $request->input("nombre_usuario");
        $usuario->correo = $request->input("correo");

        $password = $request->input("password");
        if ($password != null){
            $usuario->password = Hash::make($request->password);
        }

        try{
            $role = Role::find($request->input("role_id"));
            $usuario->roles_id = $role->id;
            $usuario->save();

        } catch (QueryException $ex){
            return redirect()->action(UsuariosController::CONTROLADOR . 'edit')->withInput();
        }
        return redirect()->action(UsuariosController::CONTROLADOR . 'index');
    }

    public function destroy()
    {

    }
}

?>
