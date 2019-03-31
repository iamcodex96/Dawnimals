<?php


namespace App\Http\Controllers\Backend;

use App\Models\Donacion;
use App\Models\Centro;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Classes\Utilitat;

class DonacionController extends Controller
{
    const PREFIX = 'backend.paginas.donaciones.';
    const CONTROLADOR = 'Backend\DonacionController@';

    public function index()
    {
        $donaciones = Donacion::all();
        $data['donaciones']=$donaciones;

        return view(DonacionController::PREFIX.'index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $centros= Centro::all();

        $data['centros'] = $centros;

        return view('donacion.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $donacion = new Donacion();
        $donacion->subtipos_id = $request->input('subtipos_id');
        $donacion->desc_animal = $request->input('desc_animal');
        $donacion->centros_receptor_id = $request->input('centros_receptor_id');
        $donacion->centro_receptor_altres = $request->input('centro_receptor_altres');
        $donacion->usuarios_id = $request->input('usuarios_id');
        $donacion->usuario_receptor = $request->input('usuario_receptor');
        $donacion->centro_desti_id = $request->input('centro_desti_id');
        $donacion->donantes_id = $request->input('donantes_id');
        $donacion->coste = $request->input('coste');
        $donacion->unidades = $request->input('unidades');
        $donacion->peso = $request->input('peso');
        $donacion->fecha_donativo = (new \DateTime())->format('Y-m-d H:i:s');
        $donacion->hay_factura = $request->input('hay_factura');
        $donacion->ruta_factura = $request->input('ruta_factura');
        $donacion->es_coordinada = $request->input('es_coordinada');

        try{
            $donacion->save();
            return redirect()->action(self::CONTROLADOR .'index');

        }catch(QueryException $e){

            $error = Utilitat::errorMessages($e);
            $request->session()->flash('error',$error);

            return redirect()->action(self::CONTROLADOR .'create')->withInput();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Donacion  $donacion
     * @return \Illuminate\Http\Response
     */
    public function show(Donacion $donacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Donacion  $donacion
     * @return \Illuminate\Http\Response
     */
    public function edit(Donacion $donacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Donacion  $donacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Donacion $donacion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Donacion  $donacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Donacion $donacion)
    {
        //
    }
}
