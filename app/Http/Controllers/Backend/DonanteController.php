<?php

namespace App\Http\Controllers\Backend;

use App\Classes\Utilitat;
use App\Http\Controllers\Controller;
use App\Models\Animal;
use App\Models\Donacion;
use App\Models\Donante;
use App\Models\Sexo;
use App\Models\TipoDonante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DonanteController extends Controller
{

    const PREFIX = 'backend.paginas.donante.';
    const CONTROLADOR = 'Backend\DonanteController@';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $resultado = Utilitat::cargaMantenimiento($request, Donante::class, 'donantes', 'Donantes', $data);
        if ($resultado != null) return $resultado;

        $data['animales'] = Animal::all();
        $data['sexos'] = Sexo::all();
        $data['tipos_donante'] = TipoDonante::all();

        return view(self::PREFIX . 'index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['sexos'] = Sexo::all();
        $data['tipodonantes'] = TipoDonante::all();
        $data['animales'] = Animal::all();

        return view(self::PREFIX . 'create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validation = validator($request->all());
        if ($validation->fails()) {
            return redirect('DonanteController@create')
                ->withErrors($validator)
                ->withInput();
        } else {
            $donante = new Donante();
            $donante->tipos_donantes_id = $request->input('tipoD');
            $donante->nombre = $request->input('full_name');
            $donante->cif = $request->input('cif');
            $donante->direccion = $request->input('direccion');
            $donante->poblacion = $request->input('ciudad');
            $donante->telefono = $request->input('telefono');
            $donante->pais = $request->input('pais');
            $donante->cp = $request->input('cp');
            $donante->sexos_id = $request->input('sexo');
            $donante->correo = $request->input('email');
            $donante->tiene_aninales = $request->input('tieneAnimales');
            $donante->es_habitual = $request->input('esHabitual');
            $meh = $request->input('animal_id');
            if ($request->input('spam') == null) {
                $donante->spam = false;
            } else {
                $donante->spam = true;
            }

            $donante->es_colaborador = $request->input('esColaborador');
            $donante->tipo_colaboracion = $request->input('tipoColaborador');
            $donante->vinculo_entidad = $request->input('vinculo');
            $donante->fecha_alta = (new \DateTime())->format('Y-m-d H:i:s');

            try {
                $donante->save();

                $donante->animales()->attach($request->input('animal_id'));

                return redirect()->action(self::CONTROLADOR . 'index');
            } catch (QueryException $e) {
                $error = Utilitat::errorMessages($e);
                $request->session()->flash('error', $error);
                return redirect()->action(self::CONTROLADOR . 'create')->withInput();
            }
        }

    }
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'tipoD' => ['required', 'int'],
            'full_name' => ['string', 'max:64'],
            'telefono' => ['number', 'max:45'],
            'cif' => ['unique:donantes', 'string', 'max:9', 'min:9'],
            'direccion' => ['max:45'],
            'ciudad' => ['max:45'],
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Donante  $donante
     * @return \Illuminate\Http\Response
     */
    public function show(Donante $donante)
    {
        $data['donante'] = $donante;
        $donaciones = Donacion::where('donantes_id', $donante->id)->get();
        $data['donaciones'] = $donaciones;
        $data['titulo'] = $donante->nombre;

        return view(self::PREFIX . 'show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Donante  $donante
     * @return \Illuminate\Http\Response
     */
    public function edit(Donante $donante)
    {
        $data['donante'] = $donante;
        $data['sexos'] = Sexo::all();
        $data['tipodonantes'] = TipoDonante::all();
        $data['animales'] = Animal::all();

        return view(self::PREFIX . 'edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Donante  $donante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Donante $donante)
    {
        $validation = validator($request->all());
        if ($validation->fails()) {
            return redirect('DonanteController')
                ->withErrors($validator)
                ->withInput();
        } else {
            $donante->tipos_donantes_id = $request->input('tipoD');
            $donante->nombre = $request->input('full_name');
            $donante->cif = $request->input('cif');
            $donante->direccion = $request->input('direccion');
            $donante->poblacion = $request->input('ciudad');
            $donante->telefono = $request->input('telefono');
            $donante->pais = $request->input('pais');
            $donante->cp = $request->input('cp');
            $donante->sexos_id = $request->input('sexo');
            $donante->correo = $request->input('email');
            $donante->tiene_aninales = $request->input('tieneAnimales');
            $donante->es_habitual = $request->input('esHabitual');
            if ($request->input('spam') == null) {
                $donante->spam = false;
            } else {
                $donante->spam = true;
            }
            $donante->es_colaborador = $request->input('esColaborador');
            $donante->tipo_colaboracion = $request->input('tipoColaborador');
            $donante->vinculo_entidad = $request->input('vinculo');
            $donante->fecha_alta = (new \DateTime())->format('Y-m-d H:i:s');

            try {
                $donante->animales()->detach();
                $donante->animales()->attach($request->input('animal_id'));

                $donante->save();
                return redirect()->action(self::CONTROLADOR . 'index');
            } catch (QueryException $e) {
                $error = Utilitat::errorMessages($e);
                $request->session()->flash('error', $error);
                return redirect()->action(self::CONTROLADOR . 'edit')->withInput();
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Donante  $donante
     * @return \Illuminate\Http\Response
     */
    public function destroy(Donante $donante)
    {
        try {
            if ($donante != null) {
                $donante->animales()->detach();
                $donaciones = Donacion::where('donantes_id', $donante->id)->get();
                foreach ($donaciones as $d) {
                    $d->donantes_id = null;
                    $d->save();
                }
                $donante->delete();
                return redirect()->action(self::CONTROLADOR . 'index');
            }
        } catch (QueryException $e) {
            $error = Utilitat::errorMessages($e);
            $request->session()->flash('error', $error);
            return redirect()->action(self::CONTROLADOR . 'index');
        }

    }

}
