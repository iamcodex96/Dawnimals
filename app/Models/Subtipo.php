<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subtipo extends Model
{
    protected $table = 'subtipos';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = false;

    public function tipos()
    {
        return $this->belongsTo('App\Models\Tipo','tipos_id');
    }

    public function donaciones()
    {
        return $this->hasMany('App\Models\Donacion', 'subtipos_id');
    }
    public function tipo()
    {
        return $this->belongsTo('App\Models\Tipo', 'tipos_id');
    }
}
