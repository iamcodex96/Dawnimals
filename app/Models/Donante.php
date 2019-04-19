<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Animal;
use App\Models\Donacion;
use App\Classes\IExportable;

class Donante extends Model implements IExportable
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

    public function toExcelRow()
    {
        return [
            $this->tipos_donantes_id,
            $this->nombre,
            $this->cif,
            $this->direcion,
            $this->poblacion,
            $this->telefono,
            $this->pais,
            $this->cp,
            $this->sexos_id,
            $this->correo,
            $this->tiene_aninales,
            $this->es_habitual,
            $this->spam,
            $this->es_colaborador,
            $this->tipo_colaboracion,
            $this->vinculo_entidad,
            $this->fecha_alta,
        ];
    }

    public static function getHeadings()
    {
        return [
            'id',
            'Tipos donantes',
            'habitual',
            'nombre',
            'cif',
            'codigo postal',
            'sexos',
            'tiene animales',
            'telefono',
            'correo',
            'direccion',
            'vinculo entidad',
            'spam',
            'poblacion',
            'pais',
            'colaborador',
            'tipo colaboracion',
            'fecha alta'
        ];
    }
}
