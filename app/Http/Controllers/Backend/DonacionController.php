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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        //
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
