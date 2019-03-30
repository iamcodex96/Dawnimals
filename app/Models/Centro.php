<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Centro extends Model
{
    protected $table = 'centros';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = false;


    public function donacionesRecividas()
    {
        return $this->hasMany('App\Models\Donacion', 'centro_receptor_id');
    }
}
