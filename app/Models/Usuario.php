<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    use Notifiable;

    protected $table = 'usuarios';

    protected $primaryKey = "id";
    public $incrementing = true;
    protected $keyType = "int";

    public $timestamps = false;

    public function role() {
        return $this->belongsTo("App\Models\Role", "roles_id");
    }
    public function donacion()
    {
        return $this->hasMany('App\Models\Donacion', 'usuario_id');
    }

    protected $hidden = [
         'password', 'remember_token',
    ];

    // public function getEmailAttribute() {
    //     return $this->attributes['correo'];
    // }

    // public function setEmailAttribute($value) {
    //     $this->attributes['correo'] = $value;
    // }
}
