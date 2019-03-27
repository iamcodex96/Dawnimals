<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoDonante extends Model
{
    protected $table = 'tipos_donantes';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = false;

    public function donantes()
    {
        return $this->hasMany('App\Models\Donante', 'tipos_donantes_id');
    }
}
