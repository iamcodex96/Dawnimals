<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Tipo;

class Subtipo extends Model
{
    protected $table = 'subtipos';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = false;

    public function donacion()
    {
        return $this->hasMany('App\Models\Donacion', 'subtipos_id');
    }


    public function tipos(){
        return $this->belongsTo(Tipo::class, 'tipos_id');
    }

}
