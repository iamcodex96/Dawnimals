<?php

namespace App\Http\Controllers\API;

use App\Models\Centro;
use App\Models\Subtipo;
use App\Models\Tipo;
use App\Models\Sexo;
use App\Models\Donante;
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
        return new DonanteResource($data);
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

    protected function getDonantesByMail($correo){
        $donantes = Donante::where('');
    }

}
