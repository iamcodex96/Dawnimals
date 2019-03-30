<?php

namespace App\Http\Controllers\API;

use App\Models\Donante;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\DonanteResource;
use Illuminate\Database\QueryException;
use App\Classes\Utilitat;

class DonanteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $donantes = Donante::All();
        return new DonanteResource($donantes);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $donante = new Donante();
        $donante->id = $request->input('id_donante');
        $donante->nombre = $request->input('nombre');
        try{
            $donante->save();
            $respuesta = (new DonanteResource($donante))->response()->setStatusCode(201);
        }catch(QueryException $qe){
            $mensaje = Utilitat::errorMessages($qe);
            $respuesta = response()->json(['error'=>$mensaje],400);
        }

        return $respuesta;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Donante  $donante
     * @return \Illuminate\Http\Response
     */
    public function show($id_donante)
    {
        $donante = Donante::find($id_donante); //with('hoteles')->
        return new DonanteResource($donante);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Donante  $donante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_donante)
    {

        $donante =  Donante::find($id_donante);
        $donante->nombre = $request->input('nombre');
        try{
            $donante->save();
            $respuesta = (new DonanteResource($donante))->response()->setStatusCode(200);
        }catch(QueryException $qe){
            $mensaje = Utilitat::errorMessages($qe);
            $respuesta = response()->json(['error'=>$mensaje],400);
        }

        return $respuesta;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Donante  $donante
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_donante)
    {
        $donante = Donante::find($id_donante);


        try{
            if($donante == null){
                $respuesta = (new DonanteResource($donante))->json(['error'=>'Donante Not Found'],404);
            }else{
                $donante->delete();
                $respuesta = (new DonanteResource($donante))->response()->setStatusCode(200);

            }

        }catch(QueryException $qe){
            $mensaje = Utilitat::errorMessages($qe);
            $respuesta = response()->json(['error'=>$mensaje],400);
        }

    }
}
