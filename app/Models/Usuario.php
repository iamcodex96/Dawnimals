<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    use Notifiable;

    protected $table = 'usuarios';
    protected $fillable = array('correo', 'password');
    public $timestamps = false;
    public static $rules = array();

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getEmailAttribute() {
        return $this->attributes['correo'];
    }

    public function setEmailAttribute($value) {
        $this->attributes['correo'] = $value;
    }
}
