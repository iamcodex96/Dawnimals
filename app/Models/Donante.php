<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Animal;

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

    public function tipoDonante()
    {
        return $this->belongsTo('App\Models\TipoDonante', 'tipos_donantes_id');
    }

    public function animales(){
        return $this->belongsToMany(Animal::class, "donantes_id");
    }
}
