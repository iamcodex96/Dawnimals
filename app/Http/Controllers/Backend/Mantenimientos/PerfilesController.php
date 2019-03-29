<?php

namespace App\Http\Controllers\Backend\Mantenimientos;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Classes\Utilitat;
use Illuminate\Database\QueryException;

class PerfilesController extends Controller
{
    const PREFIX = "backend.paginas.mantenimientos.perfiles.";
    const CONTROLADOR = "Backend\Mantenimientos\PerfilesController@";

    public function index()
    {
        $data["roles"] = Role::all();

        return view(self::PREFIX . "index", $data);
    }

    public function create()
    {
        return view(self::PREFIX . "create");
    }

    public function store(Role $perfile, Request $request)
    {
        $perfile->rol = $request->input("rol");

        try {
            $perfile->save();

        } catch (QueryException $ex) {
            $mensaje = Utilitat::controlError($ex);
            $request->session()->flash("error", $mensaje);
            return redirect()->action(self::CONTROLADOR . 'create')->withInput();
        }
        return redirect()->action(self::CONTROLADOR . 'index');
    }

    public function edit(Role $perfile)
    {
        $data["role"] = $perfile;

        return view(self::PREFIX . "edit", $data);
    }

    public function update(Role $perfile, Request $request)
    {
        $perfile->rol = $request->input("rol");

        try {
            $perfile->save();

        } catch (QueryException $ex) {
            $mensaje = Utilitat::controlError($ex);
            $request->session()->flash("error", $mensaje);
            return redirect()->action(self::CONTROLADOR . 'edit')->withInput();
        }
        return redirect()->action(self::CONTROLADOR . 'index');
    }

    public function destroy(Request $request, Role $perfile)
    {
        try {
            $perfile->delete();
        } catch (QueryException $ex) {
            $mensaje = Utilitat::controlError($ex);
            $request->session()->flash("error", $mensaje);
        }
        return redirect()->action(self::CONTROLADOR . 'index');
    }
}
