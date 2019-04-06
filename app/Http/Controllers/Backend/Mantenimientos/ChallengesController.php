<?php

namespace App\Http\Controllers\Backend\Mantenimientos;

use App\Models\Challenge;
use App\Models\Subtipo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Classes\Utilitat;
use Illuminate\Database\QueryException;

class ChallengesController extends Controller
{
    const PREFIX = "backend.paginas.mantenimientos.challenges.";
    const CONTROLADOR = "Backend\Mantenimientos\ChallengesController@";

    public function index(Request $request)
    {
        $query = Challenge::query();

        $data = [];
        $query = Utilitat::setFiltros($request, $query, $data);

        $data["challenges"] = $query->paginate(8);
        $data["subtipos"] = Subtipo::all();

        return view(self::PREFIX . "index", $data);
    }

    public function create()
    {
        $data["subtipos"] = Subtipo::all();

        return view(self::PREFIX . "create", $data);
    }

    public function store(Request $request)
    {
        $challenge = new Challenge();

        $challenge->nombre = $request->input("nombre");
        $challenge->descripcion = $request->input("descripcion");
        $challenge->fecha_ini = \DateTime::createFromFormat('d/m/Y', $request->input("fecha_ini"));
        $challenge->fecha_fin = \DateTime::createFromFormat('d/m/Y', $request->input("fecha_fin"));
        $challenge->objetivo = $request->input("objetivo");
        $challenge->subtipo_id = $request->input("subtipo_id");

        try {
            $challenge->save();

        } catch (QueryException $ex) {
            $mensaje = Utilitat::controlError($ex);
            $request->session()->flash("error", $mensaje);
            return redirect()->action(self::CONTROLADOR . 'create')->withInput();
        }
        return redirect()->action(self::CONTROLADOR . 'index');
    }

    public function edit(Challenge $challenge)
    {
        $data["challenge"] = $challenge;
        $data["subtipos"] = Subtipo::all();

        return view(self::PREFIX . "edit", $data);
    }

    public function update(Challenge $challenge, Request $request)
    {
        $challenge->nombre = $request->input("nombre");
        $challenge->descripcion = $request->input("descripcion");
        $challenge->fecha_ini = \DateTime::createFromFormat('d/m/Y', $request->input("fecha_ini"));
        $challenge->fecha_fin = \DateTime::createFromFormat('d/m/Y', $request->input("fecha_fin"));
        $challenge->objetivo = $request->input("objetivo");
        $challenge->subtipo_id = $request->input("subtipo_id");

        try {
            $challenge->save();

        } catch (QueryException $ex) {
            $mensaje = Utilitat::controlError($ex);
            $request->session()->flash("error", $mensaje);
            return redirect()->action(self::CONTROLADOR . 'edit')->withInput();
        }
        return redirect()->action(self::CONTROLADOR . 'index');
    }

    public function destroy(Request $request, Challenge $challenge)
    {
        try {
            $challenge->delete();
        } catch (QueryException $ex) {
            $mensaje = Utilitat::controlError($ex);
            $request->session()->flash("error", $mensaje);
        }
        return redirect()->action(self::CONTROLADOR . 'index');
    }
}