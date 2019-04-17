<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Classes\IExportable;

class Usuario extends Authenticatable implements IExportable
{
    use Notifiable;

    protected $table = 'usuarios';

    protected $primaryKey = "id";
    public $incrementing = true;
    protected $keyType = "int";

    public $timestamps = false;

    // public function role() {
    //     return $this->belongsTo("App\Models\Role", "roles_id");
    // }
    public function donacion()
    {
        return $this->hasMany('App\Models\Donacion', 'usuario_id');
    }

    protected $hidden = [
         'password', 'remember_token',
    ];

    public function toExcelRow()
    {
        return [
            $this->nombre,
            $this->nombre_usuario,
            $this->correo,
            $this->admin ? __("backend.administrador") : __("backend.trabajador")
        ];
    }

    public static function getHeadings()
    {
        return [
            __("backend.nombre"),
            __("backend.usuario"),
            __("backend.correo"),
            __("backend.perfil")
        ];
    }

    // public function getEmailAttribute() {
    //     return $this->attributes['correo'];
    // }

    // public function setEmailAttribute($value) {
    //     $this->attributes['correo'] = $value;
    // }
}
