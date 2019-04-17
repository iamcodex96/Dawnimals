<?php

namespace App\Models;

use App\Models\Donacion;
use Illuminate\Database\Eloquent\Model;
use App\Classes\IExportable;

class Subtipo extends Model implements IExportable
{
    protected $table = 'subtipos';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = false;

    public function donacion()
    {
        return $this->hasMany(Donacion::class, 'subtipos_id');
    }

    public function tipos()
    {
        return $this->belongsTo('App\Models\Tipo', 'tipos_id');
    }

    public function toExcelRow()
    {
        $lang = \App::getLocale();
        return [
            $lang == "ca" ? $this->nombre_cat : $this->nombre_esp,
            $this->tipos->nombre,
            $this->gama_alta,
            $this->gama_media,
            $this->gama_baja,
            $this->tipo_unidad,
        ];
    }

    public static function getHeadings()
    {
        return [
            __("backend.nombre"),
            __("backend.tipo"),
            __("backend.alta"),
            __("backend.media"),
            __("backend.baja"),
            __("backend.unidad"),
        ];
    }

}
