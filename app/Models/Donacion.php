<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Donacion extends Model
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
}
