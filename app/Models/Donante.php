<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Donante extends Model
{
    protected $table = 'donantes';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = false;

    public function sexo()
    {
        return $this->belongsTo('App\Models\Sexo', 'sexos_id');
    }
}
