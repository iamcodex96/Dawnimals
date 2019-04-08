<?php

namespace App\Http\Controllers\API;

use App\Models\Centro;
use App\Models\Subtipo;
use App\Models\Tipo;
use App\Models\Sexo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\GlobalAPIResource;
use App\Http\Resources\SubtipoResource;
use Illuminate\Database\QueryException;
use App\Classes\Utilitat;


class GlobalAPIController extends Controller{

    public function getFormData(){
        $data['tipos']=self::getTipos();
        $data['sexos']=self::getSexos();
        return new GlobalAPIResource($data);
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
    protected function getRoles(){
        return Role::all();
    }

}
