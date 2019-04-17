<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Classes\IExportable;

class Challenge extends Model implements IExportable
{
    protected $table = 'challenges';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = false;

    public function subtipo()
    {
        return $this->belongsTo('App\Models\Subtipo', 'subtipo_id');
    }

    public function toExcelRow()
    {
        return [
            $this->nombre,
            $this->descripcion,
            $this->fecha_ini,
            $this->fecha_fin,
            $this->objetivo,
            \App::getLocale() == "ca" ? $this->subtipo->nombre_cat : $this->subtipo->nombre_esp
        ];
    }

    public static function getHeadings()
    {
        return [
            __("backend.nombre"),
            __("backend.descripcion"),
            __("backend.fecha_ini"),
            __("backend.fecha_fin"),
            __("backend.objetivo"),
            __("backend.subtipo")
        ];
    }
}
