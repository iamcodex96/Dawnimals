<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Donante;

class Animal extends Model
{
    protected $table = 'animales';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = false;

    public function donantes(){
        return $this->belongsToMany(Donante::class, "animales_id");
    }

    public function donativos(){
        return $this->belongsToMany('App\Models\Animal', 'animales_id');
    }
}
