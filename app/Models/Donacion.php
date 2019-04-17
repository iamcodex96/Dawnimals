<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Classes\IExportable;

class Donacion extends Model implements IExportable
{
    protected $table = 'donativos';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = false;

    public function subtipos()
    {
        return $this->belongsTo('App\Models\Subtipo', 'subtipos_id');

    }
    public function donantes()
    {
        return $this->belongsTo('App\Models\Donante', 'donantes_id');
    }
    public function centro()
    {
        return $this->belongsTo('App\Models\Centro', 'centros_receptor_id');
    }

    public function centro_destino(){
        return $this->belongsTo('App\Models\Centro', 'centros_desti_id');
    }

    public function animales()
    {
        return $this->belongsToMany('App\Models\Animal', 'animales_donativos', 'donativos_id', 'animales_id');
    }

    public function usuario(){
        return $this->belongsTo('App\Models\Usuario', 'usuarios_id');
    }

    public function usuario_recep(){
        return $this->belongsTo('App\Models\Usuario', 'usuario_receptor');
    }

    public function toExcelRow()
    {
        return [
            $this->fecha_donativo,
            $this->subtipos->tipos->nombre,
            \App::getLocale() == "ca" ? $this->subtipos->nombre_cat : $this->subtipos->nombre_esp,
            $this->centro->nombre,
            $this->centro_destino->nombre,
            $this->animales->first()->nombre,
            $this->usuario->nombre,
            $this->usuario_recep->nombre,
            $this->donantes != null ? $this->donantes->nombre : __("backend.anonimo"),
            $this->coste,
            $this->unidades,
            $this->peso,
            $this->es_coordinada == 1 ? __("backend.si") : __("backend.no")
        ];
    }

    public static function getHeadings()
    {
        return [
            __("backend.fecha"),
            __("backend.tipo"),
            __("backend.subtipo"),
            __("backend.centro_receptor"),
            __("backend.centro_destino"),
            __("backend.animal"),
            __("backend.usuario"),
            __("backend.usuario_receptor"),
            __("backend.donante"),
            __("backend.coste"),
            __("backend.unidades"),
            __("backend.peso"),
            __("backend.es_coordinada"),

        ];
    }
}
