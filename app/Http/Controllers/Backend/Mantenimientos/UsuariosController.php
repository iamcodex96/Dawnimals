<?php

namespace App\Http\Controllers\Backend\Mantenimientos;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Classes\Utilitat;
use Illuminate\Database\QueryException;

class UsuariosController extends Controller
{
    const PREFIX = "backend.paginas.mantenimientos.usuarios.";
    const CONTROLADOR = "Backend\Mantenimientos\UsuariosController@";

    public function index(Request $request)
    {
        $query = Usuario::query();

        $data = [];
        $query = Utilitat::setFiltros($request, $query, $data);

        $data["usuarios"] = $query->paginate(1);

        return view(self::PREFIX . "index", $data);
    }

    public function create()
    {
        $data["roles"] = Role::all();

        return view(self::PREFIX . "create", $data);
    }

    public function store(Usuario $usuario, Request $request)
    {
        $usuario->nombre = $request->input("nombre");
        $usuario->nombre_usuario = $request->input("nombre_usuario");
        $usuario->correo = $request->input("correo");

        $password = $request->input("password");
        if ($password != null) {
            $usuario->password = Hash::make($request->password);
        }

        try {
            $role = Role::find($request->input("role_id"));
            $usuario->roles_id = $role->id;
            $usuario->save();

        } catch (QueryException $ex) {
            $mensaje = Utilitat::controlError($ex);
            $request->session()->flash("error", $mensaje);
            return redirect()->action(self::CONTROLADOR . 'create')->withInput();
        }
        return redirect()->action(self::CONTROLADOR . 'index');
    }

    public function edit(Usuario $usuario)
    {
        $data["roles"] = Role::all();
        $data["usuario"] = $usuario;

        return view(self::PREFIX . "edit", $data);
    }

    public function update(Usuario $usuario, Request $request)
    {
        $usuario->nombre = $request->input("nombre");
        $usuario->nombre_usuario = $request->input("nombre_usuario");
        $usuario->correo = $request->input("correo");

        $password = $request->input("password");
        if ($password != null) {
            $usuario->password = Hash::make($request->password);
        }

        try {
            $role = Role::find($request->input("role_id"));
            $usuario->roles_id = $role->id;
            $usuario->save();

        } catch (QueryException $ex) {
            $mensaje = Utilitat::controlError($ex);
            $request->session()->flash("error", $mensaje);
            return redirect()->action(self::CONTROLADOR . 'edit')->withInput();
        }
        return redirect()->action(self::CONTROLADOR . 'index');
    }

    public function destroy(Request $request, Usuario $usuario)
    {
        try {
            $usuario->delete();
        } catch (QueryException $ex) {
            $mensaje = Utilitat::controlError($ex);
            $request->session()->flash("error", $mensaje);
        }
        return redirect()->action(self::CONTROLADOR . 'index');
    }
}
