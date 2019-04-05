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
        return $this->belongsTo('App\Models\Subtipo', 'subtipo_id');
    }
    public function donantes()
    {
        return $this->belongsTo('App\Models\Donante', 'donantes_id');
    }
    public function centroReceptor()
    {
        return $this->belongsTo('App\Models\Centro', 'centro_receptor_id');
    }
}
