<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sexo extends Model
{
    protected $table = 'sexos';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = false;

    public function donantes()
    {
        return $this->hasMany('App\Models\Donante', 'sexos_id');
    }
}
