<?php

namespace App\Http\Controllers\API;

use App\Models\Centro;
use App\Models\Subtipo;
use App\Models\Tipo;
use App\Models\Sexo;
use App\Models\Donante;
use App\Models\TipoDonante;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\DonacionFormResource;
use App\Http\Resources\SubtipoResource;
use App\Http\Resources\DonanteResource;
use Illuminate\Database\QueryException;
use App\Classes\Utilitat;


class GlobalAPIController extends Controller{

    public function getDonacionesData(){
        $data['tipos']=self::getTipos();
        $data['centro']=self::getCentros();
        return new DonacionFormResource($data);
    }

    public function getDonantesData(){
        $data['donante']=self::getDonantes();
        $data['tipoDonante']=self::getTipoDonantes();
        $data['sexo']=self::getSexos();
        return new DonanteResource($data);
    }

    public function createDonante(Request $request){
        $donante = new Donante;
        $donante->tipos_donantes_id = $request->input('tipoD');
        $donante->nombre = $request->input('full_name');
        $donante->cif = $request->input('cif');
        $donante->sexos_id = $request->input('sexo');
        $donante->correo = $request->input('email');
        $donante->tiene_aninales = 0;
        $donante->es_habitual =0;
        $donante->spam = 0;
        $donante->telefono = null;
        $donante->poblacion = null;
        $donante->pais = 'ES';
        $donante->direccion = null;
        $donante->es_colaborador = 0;
        $donante->tipo_colaboracion = 0;
        $donante->vinculo_entidad = 0;
        $donante->fecha_alta = (new \DateTime())->format('Y-m-d H:i:s');
        $donante->save();
    }

    protected function getTipos(){
        return Tipo::all();
    }
    protected function getSubTiposByTipo($id_tipo){
        $subtipo = Subtipo::where('tipos_id',$id_tipo)->get();
        return new SubtipoResource($subtipo);
    }
    protected function getSexos(){
        return Sexo::all();
    }

    protected function getCentros(){
        return Centro::all();
    }
    protected function getDonantes(){
        return Donante::all();
    }
    protected function getTipoDonantes(){
        return TipoDonante::all();
    }

    public function getDonantesByMail(Request $request){
        $donantes = Donante::where('');
    }


}
