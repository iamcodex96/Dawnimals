<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Animal;
use App\Models\Donacion;

class Donante extends Model
{
    protected $table = 'donantes';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = false;


    public function donaciones(){
        return $this->belongsToMany(Donacion::class,"donativos",'id','donantes_id');
    }
    public function sexo()
    {
        return $this->belongsTo('App\Models\Sexo', 'sexos_id');
    }

    public function tipoDonante()
    {
        return $this->belongsTo('App\Models\TipoDonante', 'tipos_donantes_id');
    }

    public function animales(){
        return $this->belongsToMany(Animal::class,"donantes_animales","donantes_id","animales_id");
    }
}
